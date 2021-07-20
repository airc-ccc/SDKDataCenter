# Data Center SDK


## Install.
```
composer require pengtao/sdk_datacenter
```
## Usage
```PHP
<?php

$dataCenter = new DataCenter($config);

// order 是一个模块, send是order的一个方法
$dataCenter->order->send();

```
