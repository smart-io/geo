<?php

namespace Smart\Geo\Data;

use Smart\Geo\Data\Meta\MetaMapper;
use Smart\Geo\Storage;

class DataUpdater
{
    public static function update()
    {
        (new DataDownloader)->downloadArchive(new Storage);
    }
}
