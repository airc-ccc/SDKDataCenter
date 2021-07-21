<?php
namespace SdkDataCenter\Tests;
require __DIR__ . "/../vendor/autoload.php";
define("ROOT_PATH", dirname(__DIR__) . "/");

use Pengtao\SdkDataCenter\DataCenter;
use PHPUnit\Framework\TestCase;

class DataCenterTests extends TestCase
{
    public function testDataCenter()
    {
        $config = [
            'http' => [
                'host' => '',
            ],
            'params' => [
                '_app_token' => '2',
                '_channel' => '1',
                '_version' => '1.0.0',
                '_time' => time(),
                'uri' => '/my/info',
                'params' => json_encode([])
            ],
            'secert' => ''
        ];

        $dataCenter = new DataCenter($config);

        $result = $dataCenter->base->send();

        $this->assertIsArray($result);

        print_r($result);
    }
}
