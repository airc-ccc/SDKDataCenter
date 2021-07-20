<?php
namespace Pengtao\SdkDataCenter;

/**
 * 数据中心SDK
 * @auther Pengtao
 */
class DataCenter
{
    private $config = [];


    /**
     * $config['app_token']
     * $config['channel']
     * $config['secert']
     */
    public function __construct($config)
    {
        $this->config = $config;
    }

    public function __get($name)
    {
        $className = __NAMESPACE__ . '\\Component\\' . ucfirst($name);
        return new $className($this->config);
    }


    public function __call($name, $arguments)
    {
        $className = __NAMESPACE__ . '\\Component\\' . ucfirst($name);
        return new $className(...$arguments);
    }


    public static function __callStatic($name, $arguments)
    {
        $className = __NAMESPACE__ . '\\Component\\' . ucfirst($name);
        return new $className(...$arguments);
    }



    public function getConfig()
    {
        return $this->config;
    }
}