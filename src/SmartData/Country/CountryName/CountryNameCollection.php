<?php
namespace SmartData\SmartData\Country\CountryName;

use SmartData\SmartData\ArrayCollection;
use SmartData\SmartData\Language\LanguageEntity;

class CountryNameCollection extends ArrayCollection
{
    /**
     * @var array|CountryNameEntity[]
     */
    protected $elements;

    /**
     * @param string|LanguageEntity $key
     * @return null|CountryNameEntity
     */
    public function get($key)
    {
        if (isset($this->elements[$key])) {
            return $this->elements[$key];
        } else {
            if (is_string($key)) {
                foreach ($this->elements as $element) {
                    if (is_string($element->getLanguage()) && $key === $element->getLanguage()) {
                        return $element;
                    } elseif (
                        $element->getLanguage() instanceof LanguageEntity &&
                        $key === $element->getLanguage()->getCode()
                    ) {
                        return $element;
                    }
                }
            } elseif ($key instanceof LanguageEntity) {
                foreach ($this->elements as $element) {
                    if ($key === $element->getLanguage()) {
                        return $element;
                    }
                }
            }
        }
        return null;
    }
}
