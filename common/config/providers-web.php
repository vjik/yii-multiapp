<?php

declare(strict_types=1);

/* @var array $params */

use Common\Provider\Psr17Provider;
use Common\Provider\SessionProvider;
use Common\Provider\WebViewProvider;
use Yiisoft\Arrays\Modifier\ReverseBlockMerge;

return [
    'yiisoft/yii-web/psr17' => Psr17Provider::class,
    'yiisoft/yii-web/session' => [
        '__class' => SessionProvider::class,
        '__construct()' => [
            $params['yiisoft/yii-web']['session']['options'],
            $params['yiisoft/yii-web']['session']['handler']
        ],
    ],
    'yiisoft/view/webview' => [
        '__class' => WebViewProvider::class,
        '__construct()' => [
            $params['yiisoft/view']['basePath'],
            $params['yiisoft/view']['defaultParameters'],
        ],
    ],

    ReverseBlockMerge::class => new ReverseBlockMerge(),
];
