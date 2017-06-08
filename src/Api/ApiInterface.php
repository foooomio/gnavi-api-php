<?php
namespace Gnavi\Api;

interface ApiInterface
{
    public function getUrlPath();
    public function getUrlQuery($access_key);
}
