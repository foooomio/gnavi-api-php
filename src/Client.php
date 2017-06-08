<?php
namespace Gnavi;

use Gnavi\Api\ApiInterface;

class Client
{
    const BASE_URL = 'https://api.gnavi.co.jp';

    private $access_key;

    public function __construct($access_key)
    {
        $this->access_key = $access_key;
    }

    public function request(ApiInterface $api)
    {
        $url = self::BASE_URL
            . $api->getUrlPath() . '?'
            . $api->getUrlQuery($this->access_key);

        $ch = curl_init($url);
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 3,
        ]);

        $response = curl_exec($ch);
        curl_close($ch);

        if ($response === false) {
            exit(1);
        }

        return json_decode($response);
    }
}
