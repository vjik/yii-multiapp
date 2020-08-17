<?php

declare(strict_types=1);

/* @var array $params */

use AppAdmin\Provider\MiddlewareProvider;
use AppAdmin\Provider\RouterProvider;
use Yiisoft\Arrays\Modifier\ReverseBlockMerge;
use Yiisoft\Composer\Config\Builder;
use Yiisoft\Yii\Event\EventDispatcherProvider;

return [
    'yiisoft/router-fastroute/router' => [
        '__class' => RouterProvider::class,
        '__construct()' => [Builder::require('routes')],
    ],
    'yiisoft/yii-web/middleware' => MiddlewareProvider::class,

    'yiisoft/event-dispatcher/eventdispatcher' => [
        '__class' => EventDispatcherProvider::class,
        '__construct()' => [Builder::require('events-app')],
    ],

    ReverseBlockMerge::class => new ReverseBlockMerge(),
];
