<?php
namespace Gnavi\Api;

trait ApiTrait
{
    private $params = [];

    public function getPath()
    {
        return implode('/', ['', self::API_NAME, self::VERSION, '']);
    }

    public function getQuery($access_key)
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
