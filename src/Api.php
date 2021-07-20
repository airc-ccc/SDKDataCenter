<?php
namespace Pengtao\SdkDataCenter;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

use Pengtao\SdkDataCenter\ApiInterface;

class Api implements ApiInterface
{

    private $client;

    private $params;

    private $secert;

    private $headers = [];


    public function __construct($params, $secert, $headers = [])
    {
        $this->secert = $secert;
        $this->params = $params;
        if (! empty($headers)) {
            $this->headers = array_merge($this->headers, $headers);
        }
        $this->client = new Client([
            'base_uri' => self::BASE_HOST,
            'timeout'  => 2.0
        ]);
    }


    public function sign()
    {
        ksort($this->params);
        $paramsString = "";
        foreach($this->params as $k => $v) {
            $paramsString .= $k . $v . '&';
        }
        $paramsString .= $this->secert;
        $this->params['sign'] = hash("sha256", $paramsString);
    }


    public function getRequest()
    {
        return new Request(
            'POST', 
            self::BASE_HOST.self::BASE_ROUTE, 
            $this->headers,
            json_encode($this->params)
        );
    }


    public function sendAsync()
    {
        $request = $this->getRequest();

        return $this->client->sendAsync($request);
    }
}