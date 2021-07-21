<?php
namespace Pengtao\SdkDataCenter\Component;

use GuzzleHttp\Exception\InvalidArgumentException;

abstract class AbstractComponent 
{
    protected $http = [];

    protected $params = [];

    protected $secert = '';

    public $rule = [];

    public function __construct($config)
    {
        $this->http = $config['http'];
        $this->params = $config['params'];

        if (empty($config['secert'])) {
            throw new \InvalidArgumentException('Not Found Secert Key.');
        }
        $this->secert = $config['secert'];
    }


    public function __call($name, $arguments)
    {
        return $this->{$name}(...$arguments);
    }


    private function validParms()
    {
        foreach($this->rule as $k => $field) {
            $functionName = 'valid'.ucfirst($k);

            $this->$functionName($field);
        }
    }


    private function validRequired($field)
    {
        foreach ($field as $k) {
            if (! array_key_exists($k, $this->params)) {
                throw new InvalidArgumentException("The `{$k}` params is required.");
            }
        }
    }


    private function validType($field)
    {
        foreach ($field as $k => $type) {
            $gtype = gettype($this->params[$k]);
            if ($gtype != $type) {
                throw new InvalidArgumentException("Type Error: `{$k}` need `{$type}`, give `{$gtype}`");
            }
        }
    }
}