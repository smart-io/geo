<?php
namespace SmartData\SmartData\Country;

use SmartData\SmartData\ArrayCollection;
use SmartData\SmartData\Coordinate\CoordinateCollectionInterface;
use SmartData\SmartData\Language\LanguageEntity;

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
