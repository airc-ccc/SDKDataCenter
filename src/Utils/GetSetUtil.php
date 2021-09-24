<?php
namespace Pengtao\SdkDataCenter\Utils;

trait GetSetUtil 
{
    public function __call($method, $args)
    {
        $action = substr($method, 0, 3);
        $paramName = lcfirst(substr($method, 3));
        if ($action == 'set') {
            $this->$paramName = $args[0];
            return $this;
        } else if($action == 'get') {
            return $this->$paramName;
        }
    }


    public function __get($name)
    {
        return $this->$name();
    }


    public function __set($name, $value)
    {
        $this->$name = $value;
    }


    public function getAllParam()
    {
        return get_class_vars(static::class);
    }
}