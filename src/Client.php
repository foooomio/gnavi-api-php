<?php
namespace Gnavi;

use Gnavi\Result;
use Gnavi\Api\ApiInterface;

class Client
{
    const BASE_URL = 'https://api.gnavi.co.jp';
    const CURL_OPTIONS = [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FAILONERROR => true,
    ];

    private $access_key;
    private $curl_options;

    public function __construct($access_key, array $curl_options = [])
    {
        $this->access_key = $access_key;
        $this->curl_options = $curl_options;
    }

    public function request(ApiInterface $api, array $curl_options = [])
    {
        $url = $this->buildUrl($api);
        $options = $curl_options + $this->curl_options + self::CURL_OPTIONS;

        $ch = curl_init($url);
        curl_setopt_array($ch, $options);

        $response = curl_exec($ch);
        $errno = curl_errno($ch);
        $error = curl_error($ch);
        curl_close($ch);

        if ($errno !== CURLE_OK) {
            throw new \RuntimeException($error, $errno);
        }

        $json = json_decode($response, true);

        if (isset($json['error'])) {
            $message = $json['error']['message'];
            $code = $json['error']['code'];
            throw new \RuntimeException($message, $code);
        }

        return new Result($json);
    }

    private function buildUrl(ApiInterface $api)
    {
        $path = $api->getPath();
        $query = $api->getQuery($this->access_key);
        return self::BASE_URL . $path . '?' . $query;
    }
}
