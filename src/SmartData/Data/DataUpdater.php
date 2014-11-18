<?php
namespace SmartData\SmartData\Data;

use SmartData\SmartData\Data\Meta\MetaMapper;
use SmartData\SmartData\Storage;

class DataUpdater
{
    public static function update()
    {
        $metaData = (new MetaMapper())->loadCollection();
        $dataDownloader = new DataDownloader();
        $storage = new Storage();

        foreach ($metaData as $meta) {
            $dataDownloader->download($meta, $storage);
        }
    }
}
