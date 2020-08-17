<?php

declare(strict_types=1);

/* @var array $params */

use AppAdmin\ApplicationParameters;
use AppAdmin\ViewRenderer;

return [
    ApplicationParameters::class => static function () use ($params) {
        return (new ApplicationParameters())
            ->charset($params['app']['charset'])
            ->language($params['app']['language']);
    },

    ViewRenderer::class => [
        '__construct()' => [
            'viewBasePath' => '@views',
            'layout' => '@resources/layout/main',
        ],
    ],
];
