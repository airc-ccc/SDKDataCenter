<?php

use Illuminate\Support\ServiceProvider;

class DataCenterProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->register('dataCenter', function () {
            return new DataCenter();
        });
    }
}