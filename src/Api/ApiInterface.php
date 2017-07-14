<?php
namespace Gnavi\Api;

interface ApiInterface
{
    public function addQueryParam($key, $value);
    public function getPath();
    public function getQuery($access_key);
}
