<?php
namespace SmartData\SmartData\Geolocation;

class GeolocationMapper
{
    /**
     * @param array $result
     * @return null|GeolocationEntity
     */
    public function mapGeoIp(array $result)
    {
        if (isset($result['location']['latitude']) && isset($result['location']['longitude'])) {
            $geoLocation = new GeolocationEntity();
            $geoLocation->setSource(GeolocationEntity::SOURCE_IP);
            $geoLocation->setLatitude($result['location']['latitude']);
            $geoLocation->setLongitude($result['location']['longitude']);
            return $geoLocation;
        }
        return null;
    }
}
