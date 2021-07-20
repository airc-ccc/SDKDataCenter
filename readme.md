# Data Center SDK


## Install
```
composer require pengtao/sdk_datacenter
```
## Usage
```PHP
<?php

$config = [
    'params' => [
        '_app_token' => '',
        '_channel' => '',
        '_version' => '',
        '_time' => time(),
        'uri' => '',
        'params' => ''
    ],
    'secert' => ''
];

$dataCenter = new DataCenter($config);

$dataCenter->base->send();

```
