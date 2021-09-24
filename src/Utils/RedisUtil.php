<?php
namespace Pengtao\SdkDataCenter\Utils;

use Pengtao\SdkDataCenter\SdkDataCenterException;

/**
 * Connection Redis.
 */
class RedisUtil extends UtilBase
{
    private static $redisClient;


    /**
     * Craete redis client instance.
     * @author  Pengtao
     * @param Array $config
     *  [
     *      'scheme' => 'redis',
     *      'host'   => 'localhost',
     *      'port'   => '6379
     *  ]
     */
    public static function init($config, $options = array())
    {
        self::processConfig($config);
        if (! self::$redisClient instanceof \Predis\Client) {
            self::$redisClient = new \Predis\Client($config, $options);
        }
        return self::$redisClient;
    }



    private static function processConfig($config)
    {
        if (empty($config['scheme'])) {
            throw new SdkDataCenterException("The redisClient configuration is missing scheme");
        }
        if (empty($config['host'])) {
            throw new SdkDataCenterException("The redisClient configuration is missing host");
        }
        if (empty($config['port'])) {
            throw new SdkDataCenterException("The redisClient configuration is missing port");
        }
    }
}