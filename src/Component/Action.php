<?php
namespace Pengtao\SdkDataCenter\Component;

use Pengtao\SdkDataCenter\Api;

class Action extends AbstractComponent 
{
    private $route = "/base-api/set-action";

    private $apiClass;

    const ACTION_REGISTER = 'REGISTER';
    const ACTION_PAY = 'PAY';

    /**
     * Type: string、integer
     */
    public $rule = [
        'required' => ['action_buid', 'action_key', 'action_params', 'action_timestamp'],
        'type' => [
            'action_key' => 'string',
            'action_params' => 'string',
            'action_timestamp' => 'integer', 
            'action_buid' => 'integer']
    ];


    public function __construct($config)
    {
        parent::__construct($config);
        $this->validParms();
        $this->apiClass = new Api($this->http, $this->route, $this->params, $this->secert);
    }


    public function send()
    {
        $async = false;
        $result = $this->apiClass->sendAsync($async);
        return $result;
    }
}