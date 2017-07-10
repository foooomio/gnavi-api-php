<?php
namespace Gnavi\Api;

interface ApiInterface
{
    public function getPath();
    public function getQuery($access_key);
}
