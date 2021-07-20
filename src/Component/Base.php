<?php
namespace Pengtao\SdkDataCenter\Component;

use Pengtao\SdkDataCenter\Api;

use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Exception\RequestException;

class Base extends AbstractComponent 
{
    private $apiClass;

    public $rule = [
        'required' => ['uri', 'params'],
        'type' => ['uri' => 'string', 'params' => 'string']
    ];


    public function __construct($config)
    {
        parent::__construct($config);
        $this->validParms();
        $this->apiClass = new Api($this->params, $this->secert);
    }


    public function send()
    {
        $async = false;
        $result = $this->apiClass->sendAsync($async);
        return $result;
    }
}