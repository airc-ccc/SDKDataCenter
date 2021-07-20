<?php
namespace Pengtao\SdkDataCenter\Component;

abstract class AbstractComponent 
{
    protected $params = [];

    protected $secert = '';


    public function __construct($config)
    {
        $this->params = $config['params'];

        if (empty($this->config['secert'])) {
            throw new \InvalidArgumentException('Not Found Secert Key.');
        }
        $this->secert = $config['secert'];
    }


    public function __call($name, $arguments)
    {
        return $this->{$name}(...$arguments);
    }
}