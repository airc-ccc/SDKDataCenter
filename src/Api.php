<?php
namespace Pengtao\SdkDataCenter;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\InvalidArgumentException as ExceptionInvalidArgumentException;
use InvalidArgumentException;
use Pengtao\SdkDataCenter\ApiInterface;

class Api implements ApiInterface
{
    private $client;

    private $params;

    private $secert;

    private static $publicParams = [
        '_app_token',
        '_channel',
        '_version',
        '_time' 
    ];

    private $headers = [
        'Content-Type' => 'application/json'
    ];

    public function __construct($params, $secert, $headers = [])
    {
        $this->secert = $secert;
        $this->params = $params;
        $this->processPublicParams();
        if (! empty($headers)) {
            $this->headers = array_merge($this->headers, $headers);
        }
        $this->sign();
        $this->client = new Client([
            'base_uri' => self::BASE_HOST,
            'timeout'  => 2.0
        ]);
    }


    public function sign()
    {
        krsort($this->params);
        $paramsString = "";
        foreach($this->params as $k => $v) {
            $paramsString .= $k . $v . '&';
        }
        $paramsString .= $this->secert;
        $sha = hash("sha256", $paramsString, false);
        $this->params['_sign'] = $sha;
    }


    public function sendAsync($async = false)
    {
        print_r("\n ");
        print_r($this->params);
        $response = $this->client->request('POST', self::BASE_ROUTE, 
        [
            'headers' => $this->headers,
            'body' => json_encode($this->params)
        ]);
        return $this->processResponse($response);
    }


    /**
     * 处理返回结果
     * @param $response
     * @return array
     */
    private function processResponse($response)
    {
        if ($response->getStatusCode() !== 200) {
            throw new Exception("Request DataCenter Failed.");
        }
        $body = $response->getBody();
        if (empty($body)) {
            throw new Exception("Reponse Body Is NULL.");
        }
        $content = $body->getContents();
        return json_decode($content, true);
    }


    private function processPublicParams()
    {
        foreach(self::$publicParams as $k) {
            if (! array_key_exists($k, $this->params)) {
                throw new ExceptionInvalidArgumentException("The `{$k}` params is missing.");
            }
        }
    }
}