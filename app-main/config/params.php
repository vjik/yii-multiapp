<?php

declare(strict_types=1);

use AppMain\ApplicationParameters;

return [
    'aliases' => [
        '@app' => '@root/app-main',
        '@resources' => '@app/resources',
        '@views' => '@resources/views',
    ],
    'yiisoft/log-target-file' => [
        'file-target' => [
            'file' => '@runtime/logs/app-main.log',
        ],
    ],
    'yiisoft/view' => [
        'basePath' => '@resources/layout',
        'defaultParameters' => [
            'applicationParameters' => ApplicationParameters::class,
        ],
    ],
];
