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
        if (
            isset($result['location']['latitude']) &&
            isset($result['location']['longitude']) &&
            isset($result['country']['iso_code'])
        ) {
            $geoLocation = new GeolocationEntity();
            $geoLocation->setSource(GeolocationEntity::SOURCE_IP);
            $geoLocation->setLatitude($result['location']['latitude']);
            $geoLocation->setLongitude($result['location']['longitude']);
            $geoLocation->setCountry($result['country']['iso_code']);

            if (isset($result['subdivisions'][0]['iso_code'])) {
                $geoLocation->setRegion($result['subdivisions'][0]['iso_code']);
            }

            return $geoLocation;
        }
        return null;
    }
}
