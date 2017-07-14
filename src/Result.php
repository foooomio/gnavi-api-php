<?php
namespace Gnavi;

class Result implements \IteratorAggregate
{
    private $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function getIterator()
    {
        return new \ArrayIterator($this->data['rest']);
    }
}
