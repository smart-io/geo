<?php

namespace Smart\Geo;

class Storage
{
    /**
     * @var string
     */
    private $storage;

    /**
     * @return string
     */
    public function getStorage()
    {
        if (null === $this->storage) {
            $this->storage = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'storage';
        }
        return $this->storage;
    }

    /**
     * @param string $storage
     * @return $this
     */
    public function setStorage($storage)
    {
        $this->storage = $storage;
        return $this;
    }
}
