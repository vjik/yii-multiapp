<?php

declare(strict_types=1);

use Psr\Log\LogLevel;

return [
    'aliases' => [
        '@root' => dirname(__DIR__, 2),
        '@common' => '@root/common',
        '@runtime' => '@root/runtime',
    ],

    'yiisoft/log-target-file' => [
        'file-target' => [
            'file' => '@runtime/logs/app.log',
            'levels' => [
                LogLevel::EMERGENCY,
                LogLevel::ERROR,
                LogLevel::WARNING,
                LogLevel::INFO,
                LogLevel::DEBUG,
            ],
        ],
        'file-rotator' => [
            'maxfilesize' => 10,
            'maxfiles' => 5,
            'filemode' => null,
            'rotatebycopy' => null
        ],
    ],

    'yiisoft/yii-web' => [
        'session' => [
            'options' => ['cookie_secure' => 0],
            'handler' => null
        ],
    ],

    'app-main' => require dirname(__DIR__) . '/app-main/params.php',
];
