<?php

use Xervice\AwsSdk\AwsSdkConfig;
use Xervice\DataProvider\DataProviderConfig;

$config[DataProviderConfig::DATA_PROVIDER_GENERATED_PATH] = dirname(__DIR__) . '/src/Generated';
$config[DataProviderConfig::DATA_PROVIDER_PATHS] = [
    dirname(__DIR__) . '/src/',
    dirname(__DIR__) . '/vendor/',
];


if (class_exists(AwsSdkConfig::class)) {
    $config[AwsSdkConfig::CLIENT_CONFIG] = [
        'key' => '',
        'secret' => '',
        'region' => 'eu-central-1'
    ];
}