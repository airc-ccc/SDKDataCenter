# Data Center SDK


## Install
```
composer require pengtao/sdk_datacenter
```
## Usage for DataCenter
```PHP
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

### Components

- Base
- Action


## Usage for DataCenterStat
```PHP
$config = [
    'redis' => 
        [
            'scheme' => 'tcp',
            'host'   => '0.0.0.0',
            'port'   => '6379',
            'database' => 6
        ]
];
$dataCenterStat = new DataCenterStat($config);
$bookStat = $dataCenterStat->book;
$bookStat->setBookId(11111);
$bookStat->setChapterId(22222);
$bookStat->setUserId(333333);
$bookStat->setReadDate(44444);
$bookStat->setChannel(555555);
$bookStat->setReadSeconds(66666);

$bookStat->setReadBookNumber();
```