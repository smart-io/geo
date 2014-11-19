<?php
namespace SmartData\SmartData\Tests\Geolocation;

use PHPUnit_Framework_TestCase;
use SmartData\SmartData\Geolocation\GeolocationRepository;
use SmartData\SmartData\Ip\IpEntity;

class GeolocationRepositoryTest extends PHPUnit_Framework_TestCase
{
    public function testFindByIp()
    {
        $ip = new IpEntity();
        $ip->setIp('70.80.14.120');

        $repository = new GeolocationRepository();
        $geolocation = $repository->findByIp($ip);

        $this->assertNotEmpty($geolocation->getLatitude());
        $this->assertNotEmpty($geolocation->getLongitude());
        $this->assertEquals('ip', $geolocation->getSource());
    }
}
