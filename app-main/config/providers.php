<?php

declare(strict_types=1);

/* @var array $params */

use AppMain\Provider\MiddlewareProvider;
use AppMain\Provider\RouterProvider;
use Common\Provider\WebViewProvider;
use Yiisoft\Arrays\ArrayHelper;
use Yiisoft\Arrays\Modifier\ReplaceValue;
use Yiisoft\Arrays\Modifier\ReverseBlockMerge;

return [
    'yiisoft/router-fastroute/router' => RouterProvider::class,
    'yiisoft/yii-web/middleware' => MiddlewareProvider::class,

    // @todo Use merge params when added https://github.com/yiisoft/composer-config-plugin/issues/99
    'yiisoft/log-target-file/filetarget' => [
        '__construct()' => new ReplaceValue([
            $params['app-main']['yiisoft/log-target-file']['file-target']['file'],
            $params['yiisoft/log-target-file']['file-target']['levels']
        ]),
    ],

    // @todo Move to cUse merge params when added https://github.com/yiisoft/composer-config-plugin/issues/99
    'yiisoft/view/webview' => [
        '__class' => WebViewProvider::class,
        '__construct()' => new ReplaceValue([
            $params['app-main']['yiisoft/view']['basePath'],
            ArrayHelper::merge(
                $params['yiisoft/view']['defaultParameters'],
                $params['app-main']['yiisoft/view']['defaultParameters']
            ),
        ]),
    ],

    ReverseBlockMerge::class => new ReverseBlockMerge(),
];
