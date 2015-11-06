<?php

namespace Smart\Geo\Data;

use Smart\Geo\Data\Meta\Meta;
use Smart\Geo\Storage;

class DataDownloader
{
    public static function deleteDir($dirPath)
    {
        if (!is_dir($dirPath)) {
            return null;
        }
        if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
            $dirPath .= '/';
        }
        $files = glob($dirPath . '*', GLOB_MARK);
        foreach ($files as $file) {
            if (is_dir($file)) {
                self::deleteDir($file);
            } else {
                unlink($file);
            }
        }
        rmdir($dirPath);
    }

    public function downloadArchive(Storage $storage)
    {
        $tmpFile = $this->downloadFile("https://smartdataprovider.com/geo.tar.gz");
        $tmpFile = $this->moveFile($tmpFile, 'geo.tar.gz', $storage);
        self::deleteDir($storage->getStorage() . "/countries");
        self::deleteDir($storage->getStorage() . "/geolite2");
        self::deleteDir($storage->getStorage() . "/regions");
        exec("tar zxvf \"{$tmpFile}\" -C " . dirname($tmpFile) . " &> /dev/null");
        unlink($tmpFile);
    }

    /**
     * @param Meta $meta
     * @param Storage $storage
     * @return string
     */
    public function download(Meta $meta, Storage $storage)
    {
        $tmpFile = $this->downloadFile($meta->getProvider());
        $tmpFile = $this->uncompress($meta, $tmpFile);

        if ($meta->getComponents()) {
            $this->downloadComponents($tmpFile, $meta->getComponents(), $storage);
        }

        return $this->moveFile($tmpFile, $meta->getPath() . DIRECTORY_SEPARATOR . $meta->getFilename(), $storage);
    }

    /**
     * @param string $dataFile
     * @param array $components
     * @param Storage $storage
     */
    private function downloadComponents($dataFile, array $components, Storage $storage)
    {
        $data = json_decode(file_get_contents($dataFile), true);
        foreach ($components as $component) {
            foreach ($data as $entry) {
                $key = $entry[$component['key']];
                $provider = sprintf($component['provider'], $key);

                $tmpFile = $this->downloadFile($provider);
                $path = sprintf($component['path'], $key);
                $filename = sprintf($component['filename'], $key);
                $this->moveFile($tmpFile, $path . DIRECTORY_SEPARATOR . $filename, $storage);
            }
        }
    }

    /**
     * @param string $file
     * @return string
     */
    private function downloadFile($file)
    {
        $filename = basename($file);
        $destination = tempnam(sys_get_temp_dir(), 'smartdata');

        if (!is_dir($destination)) {
            if (file_exists($destination)) {
                unlink($destination);
            }
            mkdir($destination, 0777, true);
        }

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $file);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $data = curl_exec($ch);
        curl_close($ch);
        $file = fopen($destination . DIRECTORY_SEPARATOR . $filename, "w+");
        fputs($file, $data);
        fclose($file);

        return $destination . DIRECTORY_SEPARATOR . $filename;
    }

    /**
     * @param Meta $meta
     * @param string $tmpFile
     * @return string
     */
    private function uncompress(Meta $meta, $tmpFile)
    {
        if ($meta->getCompression()) {
            chdir(dirname($tmpFile));

            $filename = basename($tmpFile);
            $newfilename = preg_replace('/\.gz$/', '', $filename);

            exec("gzip -d \"{$filename}\"");

            return dirname($tmpFile) . DIRECTORY_SEPARATOR . $newfilename;
        }
        return $tmpFile;
    }

    /**
     * @param string $tmpFile
     * @param string $destination
     * @param Storage $storage
     * @return string
     */
    private function moveFile($tmpFile, $destination, Storage $storage)
    {
        if (!is_dir($storage->getStorage())) {
            if (file_exists($storage->getStorage())) {
                unlink($storage->getStorage());
            }
            mkdir($storage->getStorage(), 0777, true);
        }

        $newFilename = implode(
            DIRECTORY_SEPARATOR,
            [$storage->getStorage(), $destination]
        );

        if (!is_dir(dirname($newFilename))) {
            mkdir(dirname($newFilename), 0777, true);
        }

        rename(
            $tmpFile,
            $newFilename
        );
        return $newFilename;
    }
}
