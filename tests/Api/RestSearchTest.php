<?php
namespace Gnavi\Api\Test;

use Gnavi\Api\RestSearch;

class RestSearchTest extends \PHPUnit_Framework_TestCase
{
    public $api;

    public function setUp()
    {
        $this->api = new RestSearch();
    }

    public function testGetUrlPath()
    {
        $expected = '/RestSearchAPI/20150630/';
        $actual = $this->api->getUrlPath();

        $this->assertEquals($expected, $actual);
    }

    public function testGetUrlQuery()
    {
        $access_key = 'dummy';

        $expected = 'keyid=dummy&format=json';
        $actual = $this->api->getUrlQuery($access_key);

        $this->assertEquals($expected, $actual);
    }

    public function testLatitude()
    {
        $value = 35.670083;
        $this->api->latitude($value);

        $needle = 'latitude=35.670083';
        $haystack = $this->api->getUrlQuery(null);

        $this->assertContains($needle, $haystack);
    }

    public function testLongitude()
    {
        $value = 139.763267;
        $this->api->longitude($value);

        $needle = 'longitude=139.763267';
        $haystack = $this->api->getUrlQuery(null);

        $this->assertContains($needle, $haystack);
    }

    public function testRange()
    {
        $range = \Gnavi\Util\Range::R500;
        $this->api->range($range);

        $needle = 'range=2';
        $haystack = $this->api->getUrlQuery(null);

        $this->assertContains($needle, $haystack);
    }
}
