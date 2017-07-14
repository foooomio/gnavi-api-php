<?php
namespace Gnavi\Test;

use Gnavi\Client;
use Gnavi\Api\RestSearch;

class ClientTest extends \PHPUnit_Framework_TestCase
{
    public function testMain()
    {
        $access_key = getenv('ACCESS_KEY');

        $api = new RestSearch();
        $api->latitude(35.670083)
            ->longitude(139.763267)
            ->range(\Gnavi\Util\Range::R500);

        $client = new Client($access_key);
        $result = $client->request($api);

        foreach($result as $shop) {
            var_dump($shop['name']);
        }
    }
}
