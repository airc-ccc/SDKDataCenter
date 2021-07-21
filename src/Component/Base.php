<?php
namespace Pengtao\SdkDataCenter\Component;

use Pengtao\SdkDataCenter\Api;

class Base extends AbstractComponent 
{
    private $apiClass;

    /**
     * Type: string、integer
     */
    public $rule = [
        'required' => ['base_uri', 'params', 'remote_addr'],
        'type' => ['base_uri' => 'string', 'params' => 'string', 'remote_addr' => 'integer']
    ];


    public function __construct($config)
    {
        parent::__construct($config);
        $this->validParms();
        $this->apiClass = new Api($this->http, $this->params, $this->secert);
    }


    public function send()
    {
        $async = false;
        $result = $this->apiClass->sendAsync($async);
        return $result;
    }
}