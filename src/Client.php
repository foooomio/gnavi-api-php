<?php
namespace Gnavi;

use Gnavi\Api\ApiInterface;

class Client
{
    const BASE_URL = 'https://api.gnavi.co.jp';

    private $access_key;
    private $curl_options = [
        CURLOPT_RETURNTRANSFER => true,
    ];

    public function __construct($access_key, array $curl_options = [])
    {
        $this->access_key = $access_key;
        $this->curl_options = $curl_options + $this->curl_options;
    }

    public function request(ApiInterface $api, array $curl_options = [])
    {
        $url = $this->buildUrl($api);
        $ch = curl_init($url);
        curl_setopt_array($ch, $curl_options + $this->curl_options);

        $response = curl_exec($ch);
        curl_close($ch);

        if ($response === false) {
            exit(1);
        }

        return json_decode($response, true);
    }

    private function buildUrl(ApiInterface $api)
    {
        $path = $api->getPath();
        $query = $api->getQuery($this->access_key);
        return implode('', [self::BASE_URL, $path, '?', $query]);
    }
}
