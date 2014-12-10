<?php
namespace SmartData\SmartData\Region\RegionName;

use SmartData\SmartData\ArrayCollection;
use SmartData\SmartData\Language\LanguageEntity;

class RegionNameCollection extends ArrayCollection
{
    /**
     * @var array|RegionNameEntity[]
     */
    protected $elements;

    /**
     * @param string|LanguageEntity $key
     * @return null|RegionNameEntity
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
                    } elseif ($key === $element->getLanguage()->getCode()) {
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
