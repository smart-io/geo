<?php

namespace Smart\Geo\Language;

use Smart\Geo\ArrayCollection;

class LanguageCollection extends ArrayCollection
{
    /**
     * @var LanguageEntity[]
     */
    protected $elements;

    /**
     * @param string $language
     * @return null|LanguageEntity
     */
    public function get($language)
    {
        foreach ($this->elements as $element) {
            if ($language === $element->getCode()) {
                return $element;
            }
        }
        return null;
    }
}
