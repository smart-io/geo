<?php

namespace Smart\Geo\Data;

use Smart\Geo\Data\Meta\MetaMapper;
use Smart\Geo\Storage;

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
