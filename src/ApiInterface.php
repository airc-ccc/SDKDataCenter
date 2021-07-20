<?php
namespace Pengtao\SdkDataCenter;

interface ApiInterface
{
    const BASE_HOST = "http://localhost:7801"; // 数据中心域名

    const BASE_ROUTE = "/base-api/set-data"; // 请求地址

    /**
     * 签名参数
     */
    public function sign();


    /**
     * 发出请求
     */
    public function sendAsync();
}