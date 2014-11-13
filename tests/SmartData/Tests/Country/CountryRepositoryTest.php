<?php
namespace SmartData\SmartData\Tests\Country;

use PHPUnit_Framework_TestCase;
use SmartData\SmartData\Country\CountryEntity;
use SmartData\SmartData\Country\CountryRepository;
use SmartData\SmartData\Storage;

class CountryRepositoryTest extends PHPUnit_Framework_TestCase
{
    public function getRepository()
    {
        return new CountryRepository(new Storage());
    }

    public function testFindAll()
    {
        $collection = $this->getRepository()->findAll();
        $this->assertGreaterThan(1, count($collection));
        $countryExample = $collection->get(0);
        $this->assertInstanceOf(CountryEntity::class, $countryExample);
        $this->assertEquals(3, strlen($countryExample->getCode()));
    }

    public function testFindByShortCode()
    {
        $country = $this->getRepository()->findByShortCode('DE');
        $this->assertInstanceOf(CountryEntity::class, $country);
        $this->assertEquals(3, strlen($country->getCode()));
    }
}
