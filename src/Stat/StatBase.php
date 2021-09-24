<?php
namespace Pengtao\SdkDataCenter\Stat;

use Pengtao\SdkDataCenter\Utils\RedisUtil;

/**
 * 打点
 * @author Pengtao
 */
abstract class StatBase
{
    protected $_redisPrefix = "DSK_STAT_";


    protected $redisClient;


    public function __construct($config)
    {
        $options = [];
        if (isset($config['redis'])) {
            if (empty($config['redis']['prefix'])) {
                $options['prefix'] = $this->_redisPrefix;
            } else {
                $options['prefix'] = $config['redis']['prefix'];
            }
        }
        $this->redisClient = RedisUtil::init($config['redis'] ?? [], $options);
    }
}