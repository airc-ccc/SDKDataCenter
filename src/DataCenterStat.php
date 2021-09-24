<?php
namespace Pengtao\SdkDataCenter;

/**
 * 数据中心打点
 * @auther Pengtao
 */
class DataCenterStat
{
    private $config = [];


    public function __construct($config)
    {
        $this->config = $config;
    }


    public function getConfig()
    {
        return $this->config;
    }


    public function __get($name)
    {
        $className = __NAMESPACE__ . '\\Stat\\' . ucfirst($name);
        return new $className($this->config);
    }


    public function __call($name, $arguments)
    {
        $className = __NAMESPACE__ . '\\Stat\\' . ucfirst($name);
        return new $className(...$arguments);
    }


    public static function __callStatic($name, $arguments)
    {
        $className = __NAMESPACE__ . '\\Stat\\' . ucfirst($name);
        return new $className(...$arguments);
    }
}