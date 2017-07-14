<?php
namespace Gnavi\Api;

use Gnavi\Api\ApiInterface;
use Gnavi\Api\ApiTrait;

class RestSearch implements ApiInterface
{
    use ApiTrait;

    const API_NAME = 'RestSearchAPI';
    const VERSION = '20150630';

    public function latitude($latitude)
    {
        return $this->addQueryParam('latitude', $latitude);
    }

    public function longitude($longitude)
    {
        return $this->addQueryParam('longitude', $longitude);
    }

    public function range($range)
    {
        return $this->addQueryParam('range', $range);
    }
}
