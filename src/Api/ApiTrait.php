<?php
namespace Gnavi\Api;

trait ApiTrait
{
    private $params = [];

    public function getUrlPath()
    {
        return implode('/', ['', self::API_NAME, self::VERSION, '']);
    }

    public function getUrlQuery($access_key)
    {
        $required = [
            'keyid' => $access_key,
            'format' => 'json',
        ];

        return http_build_query(
            $required + $this->params,
            '', '&', PHP_QUERY_RFC3986
        );
    }
}
