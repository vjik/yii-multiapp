<?php

declare(strict_types=1);

/* @var array $params */

use AppMain\ApplicationParameters;
use Yiisoft\Aliases\Aliases;
use Yiisoft\Arrays\ArrayHelper;
use Yiisoft\Arrays\Modifier\ReplaceValue;

return [
    ApplicationParameters::class => static function () use ($params) {
        // @todo Use merge params when added https://github.com/yiisoft/composer-config-plugin/issues/99
        return (new ApplicationParameters())
            ->charset($params['app-main']['app']['charset'])
            ->language($params['app-main']['app']['language']);
    },

    // @todo Use merge params when added https://github.com/yiisoft/composer-config-plugin/issues/99
    Aliases::class => [
        '__class' => Aliases::class,
        '__construct()' => new ReplaceValue([
            ArrayHelper::merge(
                $params['aliases'],
                $params['app-main']['aliases']
            )
        ]),
    ],
];
