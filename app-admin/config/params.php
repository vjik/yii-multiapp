<?php

declare(strict_types=1);

use AppAdmin\ApplicationParameters;

return [
    'aliases' => [
        '@app' => '@root/app-admin',
        '@resources' => '@app/resources',
        '@views' => '@resources/views',
    ],

    'yiisoft/log-target-file' => [
        'file-target' => [
            'file' => '@runtime/logs/app-admin.log',
        ],
    ],
    'yiisoft/view' => [
        'basePath' => '@resources/layout',
        'defaultParameters' => [
            'applicationParameters' => ApplicationParameters::class,
        ],
    ],

    'app' => [
        'charset' => 'UTF-8',
        'language' => 'en',
    ],
];
