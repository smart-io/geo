<?php
namespace SmartData\SmartData\Data\Source;

class SourceMapper
{
    /**
     * @return Source[]
     */
    public function loadCollection()
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_URL, "https://smartdataprovider.com/source.json");
        curl_setopt($ch, CURLOPT_SSLVERSION, 3);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        curl_close($ch);

        $collection = json_decode($result, true);

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
