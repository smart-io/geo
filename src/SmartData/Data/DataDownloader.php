<?php
namespace SmartData\SmartData\Data;

use SmartData\SmartData\Data\Source\Source;
use SmartData\SmartData\Storage;

class DataDownloader
{
    /**
     * @param Source $source
     * @param Storage $storage
     * @return string
     */
    public function download(Source $source, Storage $storage)
    {
        $tmpFile = $this->downloadFile($source);
        $tmpFile = $this->uncompress($source, $tmpFile);
        return $this->moveFile($tmpFile, $source, $storage);
    }

    /**
     * @param Source $source
     * @return string
     */
    private function downloadFile(Source $source)
    {
        $filename = basename($source->getProvider());
        $destination = tempnam(sys_get_temp_dir(), 'smartdata');

        if (!is_dir($destination)) {
            if (file_exists($destination)) {
                unlink($destination);
            }
            mkdir($destination, 0777, true);
        }

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $source->getProvider());
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
     * @param Source $source
     * @param string $tmpFile
     * @return string
     */
    private function uncompress(Source $source, $tmpFile)
    {
        if ($source->getCompression()) {
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
     * @param Source $source
     * @param Storage $storage
     * @return string
     */
    private function moveFile($tmpFile, Source $source, Storage $storage)
    {
        if (!is_dir($storage->getStorage())) {
            if (file_exists($storage->getStorage())) {
                unlink($storage->getStorage());
            }
            mkdir($storage->getStorage(), 0777, true);
        }

        $newFilename = implode(
            DIRECTORY_SEPARATOR,
            [$storage->getStorage(), $source->getPath(), $source->getFilename()]
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
