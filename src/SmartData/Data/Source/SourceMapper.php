<?php
namespace SmartData\SmartData\Data\Source;

class SourceMapper
{
    /**
     * @return Source[]
     */
    public function loadCollection()
    {
        $collection = json_decode(file_get_contents("https://smartdataprovider.com/source.json"), true);
        return $this->mapJsonCollection($collection);
    }

    /**
     * @param array $collection
     * @return Source[]
     */
    public function mapJsonCollection(array $collection)
    {
        $retval = [];
        foreach ($collection as $entity) {
            $retval[] = new Source($entity);
        }
        return $retval;
    }
}
