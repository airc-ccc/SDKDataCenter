<?php
namespace SdkDataCenter;

use Illuminate\Support\ServiceProvider;

class DataCenterProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->register('sdkDataCenter', function () {
            return new DataCenter();
        });
    }
}