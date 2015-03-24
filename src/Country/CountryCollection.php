<?php

namespace Smart\Geo\Country;

use Smart\Geo\ArrayCollection;
use Smart\Geo\Coordinate\CoordinateCollectionInterface;
use Smart\Geo\Language\LanguageEntity;

/**
 * @method CountryEntity get($key)
 */
class CountryCollection extends ArrayCollection implements CoordinateCollectionInterface
{
    /**
     * @param string|LanguageEntity $language
     * @return $this
     */
    public function orderByName($language)
    {
        if ($language instanceof LanguageEntity) {
            $language = $language->getCode();
        }
        $this->order("names.{$language}.name");
        return $this;
    }
}
