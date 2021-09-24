<?php
namespace Pengtao\SdkDataCenter\Utils;

abstract class UtilBase
{
    public function __call($name, $arguments)
    {
        $className = __NAMESPACE__ . '\\' . ucfirst($name);
        return new $className(...$arguments);
    }


    public static function __callStatic($name, $arguments)
    {
        $className = __NAMESPACE__ . '\\' . ucfirst($name);
        return new $className(...$arguments);
    }
}