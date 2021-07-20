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
            'params' => [
                '_app_token' => '46961be1a6a869ca5b9b36b56e175dea',
                '_channel' => '3057b0f1047f8b49e47a2be1c0c462fd',
                '_version' => '1.0.0',
                '_time' => time(),
                'uri' => '/my/info',
                'params' => json_encode([])
            ],
            'secert' => '!@d#a$t%^a&c*e)n(*t&er^%$,./'
        ];

        $dataCenter = new DataCenter($config);

        $result = $dataCenter->base->send();

        $this->assertIsArray($result);

        print_r($result);
    }
}