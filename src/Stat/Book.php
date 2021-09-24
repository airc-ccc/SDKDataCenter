<?php
namespace Pengtao\SdkDataCenter\Stat;

use Pengtao\SdkDataCenter\Utils\GetSetUtil;

/**
 * 书籍阅读数据打点
 */
class Book extends StatBase
{
    use GetSetUtil;


    private $bookReadNumberPrefix = 'BRN';


    private $bookReadTimePrefix   = 'BRT';


    /**
     * 书籍ID
     */
    private $bookId;


    /**
     * 章节ID
     */
    private $chapterId;


    /**
     * 用户ID
     */
    private $userId;


    /**
     * 当天日期
     */
    private $readDate;



    /**
     * 渠道
     */
    private $app;



    /**
     * 渠道
     */
    private $channel;


    /**
     * 阅读秒数
     */
    private $readSeconds;


    /**
     * 设置书籍阅读次数
     */
    public function setReadBookNumber()
    {
        $data = [
            'BOOK_ID'     => $this->bookId,
            'CHAPTER_ID'  => $this->chapterId,
            'USER_ID'     => $this->userId,
            'READ_DATE'   => $this->readDate,
            'APP'         => $this->app,
            'CHANNEL'     => $this->channel,
            'CREATED_AT'  => time()
        ];

        $cacheData = json_encode($data);
        $this->redisClient->lpush($this->bookReadNumberPrefix, $cacheData);
    }


    /**
     * 设置书籍阅读时长
     */
    public function setReadBookTime()
    {
        $data = [
            'BOOK_ID'     => $this->bookId,
            'CHAPTER_ID'  => $this->chapterId,
            'USER_ID'     => $this->userId,
            'READ_DATE'   => $this->readDate,
            'APP'         => $this->app,
            'CHANNEL'     => $this->channel,
            'READ_SECONDS'=> $this->readSeconds,
            'CREATED_AT'  => time()
        ];

        $cacheData = json_encode($data);
        $this->redisClient->lpush($this->bookReadTimePrefix, $cacheData);
    }
}