<?php
namespace SmartData\SmartData\Data\Source;

interface SourceInterface
{
    public function getType();
    public function getUrl();
    public function getVersion();
    public function getCompression();
    public function getProvider();
    public function getFilename();
    public function getPath();
    public function getComponents();
}
