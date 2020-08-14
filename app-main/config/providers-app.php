<?php

declare(strict_types=1);

/* @var array $params */
/* @var array $config */

use AppMain\Provider\MiddlewareProvider;
use AppMain\Provider\RouterProvider;
use Yiisoft\Arrays\Modifier\ReverseBlockMerge;
use Yiisoft\Yii\Event\EventDispatcherProvider;

return [
    'yiisoft/router-fastroute/router' => RouterProvider::class,
    'yiisoft/yii-web/middleware' => MiddlewareProvider::class,

    'yiisoft/event-dispatcher/eventdispatcher' => [
        '__class' => EventDispatcherProvider::class,
        '__construct()' => [$config['events-app']],
    ],

    ReverseBlockMerge::class => new ReverseBlockMerge(),
];
