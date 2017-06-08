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
        $this->params['latitude'] = $latitude;
        return $this;
    }

    public function longitude($longitude)
    {
        $this->params['longitude'] = $longitude;
        return $this;
    }

    public function range($range)
    {
        $this->params['range'] = $range;
        return $this;
    }
}
