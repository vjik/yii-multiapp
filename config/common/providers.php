<?php

declare(strict_types=1);

/* @var array $params */

use Common\Provider\EventDispatcherProvider;
use Common\Provider\FileRotatorProvider;
use Common\Provider\FileTargetProvider;
use Common\Provider\LoggerProvider;
use Yiisoft\Arrays\Modifier\ReverseBlockMerge;

return [
    'yiisoft/event-dispatcher/eventdispatcher' => EventDispatcherProvider::class,

    'yiisoft/log-target-file/filerotator' => [
        '__class' => FileRotatorProvider::class,
        '__construct()' => [
            $params['yiisoft/log-target-file']['file-rotator']['maxfilesize'],
            $params['yiisoft/log-target-file']['file-rotator']['maxfiles'],
            $params['yiisoft/log-target-file']['file-rotator']['filemode'],
            $params['yiisoft/log-target-file']['file-rotator']['rotatebycopy']
        ],
    ],
    'yiisoft/log-target-file/filetarget' => [
        '__class' => FileTargetProvider::class,
        '__construct()' => [
            $params['yiisoft/log-target-file']['file-target']['file'],
            $params['yiisoft/log-target-file']['file-target']['levels']
        ],
    ],
    'yiisoft/log/logger' => LoggerProvider::class,

    ReverseBlockMerge::class => new ReverseBlockMerge(),
];
