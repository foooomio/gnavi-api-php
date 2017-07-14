<?php
namespace Gnavi\Api;

trait ApiTrait
{
    private $query_params = [];

    public function addQueryParam($key, $value, $validate = null)
    {
        if (isset($validate) && !call_user_func('is_'.$validate, $value)) {
            throw new \InvalidArgumentException("$key must be $validate.");
        }
        $this->query_params[$key] = $value;
        return $this;
    }

    public function getPath()
    {
        return '/' . self::API_NAME . '/' . self::VERSION . '/';
    }

    public function getQuery($access_key)
    {
        $required = ['keyid' => $access_key, 'format' => 'json'];
        return http_build_query(
            $required + $this->query_params, '', '&', PHP_QUERY_RFC3986
        );
    }
}
