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
                'app_token' => 'abc',
                'channel' => 'fuck'
            ],
            'secert' => ''
        ];

        $dataCenter = new DataCenter($config);

        $this->assertEquals('Send Base.', $dataCenter->base->send());
    }
}