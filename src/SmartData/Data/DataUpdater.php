<?php
namespace SmartData\SmartData\Data;

use SmartData\SmartData\Data\Source\SourceMapper;
use SmartData\SmartData\Storage;

class DataUpdater
{
    public static function update()
    {
        $sources = (new SourceMapper())->loadCollection();
        $dataDownloader = new DataDownloader();
        $storage = new Storage();

        foreach ($sources as $source) {
            $dataDownloader->download($source, $storage);
        }
    }
}
