<?php
namespace SdkDataCenter\Tests\Stat;

require __DIR__ . "/../../vendor/autoload.php";
define("ROOT_PATH", dirname(__DIR__) . "/");

use Pengtao\SdkDataCenter\DataCenterStat;
use PHPUnit\Framework\TestCase;

class BookStatTest extends TestCase
{
    public function testBookReadNumber()
    {
        $config = [
            'redis' => 
                [
                    'scheme' => 'tcp',
                    'host'   => '192.168.2.198',
                    'port'   => '6379',
                    'database' => 6
                ]
        ];
        $dataCenterStat = new DataCenterStat($config);

        $bookStat = $dataCenterStat->book;
        $bookStat->setBookId(11111);
        $bookStat->setChapterId(22222);
        $bookStat->setUserId(333333);
        $bookStat->setReadDate(44444);
        $bookStat->setChannel(555555);
        $bookStat->setReadSeconds(66666);

        $bookStat->setReadBookNumber();
    }
}
