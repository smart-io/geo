<?php
namespace SmartData\SmartData\Tests\Geolocation;

use PHPUnit_Framework_TestCase;
use SmartData\SmartData\Country\CountryEntity;
use SmartData\SmartData\Geolocation\GeolocationRepository;
use SmartData\SmartData\Ip\IpEntity;
use SmartData\SmartData\Region\RegionEntity;

class GeolocationEntityTest extends PHPUnit_Framework_TestCase
{
    public function testGetCountry()
    {
        $ip = new IpEntity();
        $ip->setIp('70.80.14.120');

        $repository = new GeolocationRepository();
        $geolocation = $repository->findByIp($ip);

        $country = $geolocation->getCountry();
        $region = $geolocation->getRegion();

        $this->assertInstanceOf(CountryEntity::class, $country);
        $this->assertNotEmpty($country->getLongitude());
        $this->assertEquals('CA', $country->getShortCode());

        $this->assertInstanceOf(RegionEntity::class, $region);
        $this->assertNotEmpty($region->getLongitude());
        $this->assertEquals('QC', $region->getCode());
    }
}
