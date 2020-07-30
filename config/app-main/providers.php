<?php

declare(strict_types=1);

/* @var array $params */

use AppMain\Provider\MiddlewareProvider;
use AppMain\Provider\RouterProvider;
use Yiisoft\Arrays\Modifier\ReplaceValue;
use Yiisoft\Arrays\Modifier\ReverseBlockMerge;

return [
    'yiisoft/router-fastroute/router' => RouterProvider::class,
    'yiisoft/yii-web/middleware' => MiddlewareProvider::class,
    'yiisoft/log-target-file/filetarget' => [
        '__construct()' => new ReplaceValue([
            $params['app-main']['yiisoft/log-target-file']['file-target']['file'],
            $params['yiisoft/log-target-file']['file-target']['levels']
        ]),
    ],

    ReverseBlockMerge::class => new ReverseBlockMerge(),
];
