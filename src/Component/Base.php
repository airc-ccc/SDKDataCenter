<?php
namespace Pengtao\SdkDataCenter\Component;

use Pengtao\SdkDataCenter\Api;

use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Exception\RequestException;

class Base extends AbstractComponent 
{
    private $apiClass;


    public function __construct()
    {
        $this->apiClass = new Api($this->params, $this->secert);
    }


    public function send()
    {
        $promise = $this->apiClass->sendAsync();

        $promise->then(
            function (ResponseInterface $response) {
                return $response->getStatusCode();
            },
            function(RequestException $e) {
                throw $e;
            }
        );
    }
}