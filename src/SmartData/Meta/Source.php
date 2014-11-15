<?php
namespace SmartData\SmartData\Data\Source;

class Source implements SourceInterface
{
    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $url;

    /**
     * @var string
     */
    private $version;

    /**
     * @var string
     */
    private $compression;

    /**
     * @var string
     */
    private $provider;

    /**
     * @var string
     */
    private $filename;

    /**
     * @var string
     */
    private $path;

    /**
     * @var array
     */
    private $components;

    /**
     * @param array $attibutes
     */
    public function __construct(array $attibutes = null)
    {
        if (null !== $attibutes) {
            $this->set($attibutes);
        }
    }

    /**
     * @param string|array $attributes
     * @param null|mixed $value
     */
    public function set($attributes, $value = null)
    {
        if (null !== $value) {
            $attributes = [$attributes => $value];
        }

        foreach ($attributes as $key => $value) {
            switch ($key) {
                case 'type':
                    $this->setType($value);
                    break;
                case 'url':
                    $this->setUrl($value);
                    break;
                case 'version':
                    $this->setVersion($value);
                    break;
                case 'compression':
                    $this->setCompression($value);
                    break;
                case 'provider':
                    $this->setProvider($value);
                    break;
                case 'filename':
                    $this->setFilename($value);
                    break;
                case 'path':
                    $this->setPath($value);
                    break;
                case 'components':
                    $this->setComponents($value);
                    break;
            }
        }
    }

    /**
     * @return string
     */
    public function getCompression()
    {
        return $this->compression;
    }

    /**
     * @param string $compression
     * @return $this
     */
    public function setCompression($compression)
    {
        $this->compression = $compression;
        return $this;
    }

    /**
     * @return string
     */
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * @param string $filename
     * @return $this
     */
    public function setFilename($filename)
    {
        $this->filename = $filename;
        return $this;
    }

    /**
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @param string $path
     * @return $this
     */
    public function setPath($path)
    {
        $this->path = $path;
        return $this;
    }

    /**
     * @return string
     */
    public function getProvider()
    {
        return $this->provider;
    }

    /**
     * @param string $provider
     * @return $this
     */
    public function setProvider($provider)
    {
        $this->provider = $provider;
        return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     * @return $this
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return string
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @param string $version
     * @return $this
     */
    public function setVersion($version)
    {
        $this->version = $version;
        return $this;
    }

    /**
     * @return array
     */
    public function getComponents()
    {
        return $this->components;
    }

    /**
     * @param array $components
     * @return $this
     */
    public function setComponents($components)
    {
        $this->components = $components;
        return $this;
    }
}
