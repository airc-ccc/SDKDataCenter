<?php
namespace SdkDataCenter\Tests;
require __DIR__ . "/../vendor/autoload.php";
define("ROOT_PATH", dirname(__DIR__) . "/");

use Pengtao\SdkDataCenter\DataCenter;
use PHPUnit\Framework\TestCase;

class DataCenterLocalTests extends TestCase
{
    public function testDataCenter()
    {
        $ip = "127.0.0.1";

        $config = [
            'params' => [
                '_app_token' => '845fd8b733504d8c99bcf0563bba0dc4',
                '_channel' => '0baa8c03f38cb3610c169b6e2b8be043',
                '_version' => '1.0.0',
                '_time' => time(),
                'base_uri' => 'http://localhost:7801/swagger-ui/#/index-controller/setDataUsingPOST',
                'params' => json_encode([]),
                'remote_addr' => ip2long($ip)
            ],
            'secert' => '!@d#a$t%^a&c*e)n(*t&er^%$,./'
        ];

        $dataCenter = new DataCenter($config);

        $result = $dataCenter->base->send();

        $this->assertIsArray($result);

        print_r($result);
    }
}
