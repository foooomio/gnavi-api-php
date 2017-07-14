<?php
namespace Gnavi\Api;

use Gnavi\Api\ApiInterface;
use Gnavi\Api\ApiTrait;

class ForeignRestSearch implements ApiInterface
{
    use ApiTrait;

    const API_NAME = 'ForeignRestSearchAPI';
    const VERSION = '20150630';

    public function restIds(array $ids)
    {
        return $this->addQueryParam('id', implode(',', $ids));
    }

    public function lang($lang)
    {
        return $this->addQueryParam('lang', $lang, 'string');
    }

    public function name($name)
    {
        return $this->addQueryParam('name', $name, 'string');
    }

    public function kana($kana)
    {
        return $this->addQueryParam('name_kana', $kana, 'string');
    }

    public function address($address)
    {
        return $this->addQueryParam('address', $address, 'string');
    }

    public function geodeticDatum($datum)
    {
        $this->addQueryParam('input_coordinates_mode', $datum, 'numeric');
        $this->addQueryParam('coordinates_mode', $datum, 'numeric');
        return $this;
    }

    public function latitude($latitude)
    {
        return $this->addQueryParam('latitude', $latitude, 'numeric');
    }

    public function longitude($longitude)
    {
        return $this->addQueryParam('longitude', $longitude, 'numeric');
    }

    public function range($range)
    {
        return $this->addQueryParam('range', $range, 'numeric');
    }

    public function sort($sort)
    {
        return $this->addQueryParam('sort', $sort, 'numeric');
    }

    public function offset($offset)
    {
        return $this->addQueryParam('offset', $offset, 'numeric');
    }

    public function limit($limit)
    {
        return $this->addQueryParam('hit_per_page', $limit, 'numeric');
    }

    public function page($page)
    {
        return $this->addQueryParam('offset_page', $page, 'numeric');
    }

    public function freeword($freeword, $operation)
    {
        $this->addQueryParam('freeword', $freeword, 'string');
        $this->addQueryParam('freeword_condition', $operation, 'numeric');
        return $this;
    }

    public function addRefiners(array $refiners)
    {
        foreach ($refiners as $refiner) {
            $this->addQueryParam($refiner, 1);
        }
        return $this;
    }
}
