<?php
namespace SmartData\SmartData\Tests\Geolocation;

use PHPUnit_Framework_TestCase;
use SmartData\SmartData\Geolocation\GeolocationRepository;
use SmartData\SmartData\Ip\IpRepository;

class GeolocationEntityTest extends PHPUnit_Framework_TestCase
{
    public function testGetCountry()
    {
        $ip = (new IpRepository())->findRealIp();

        $repository = new GeolocationRepository();
        $geolocation = $repository->findByIp($ip);

        $country = $geolocation->getCountry();

        $this->assertInstanceOf('SmartData\\SmartData\\Country\\CountryEntity', $country);
        $this->assertNotEmpty($country->getLongitude());
        $this->assertEquals('CA', $country->getShortCode());
    }
}
