<?php
namespace SmartData\SmartData\Country\CountryName;

use JsonSerializable;
use SmartData\SmartData\Language\LanguageEntity;

class CountryNameEntity implements JsonSerializable
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var LanguageEntity
     */
    private $language;

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'name' => $this->getName(),
            'language' => $this->getLanguage()
        ];
    }

    /**
     * @return LanguageEntity
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @param LanguageEntity $language
     * @return $this
     */
    public function setLanguage(LanguageEntity $language)
    {
        $this->language = $language;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getName();
    }
}
