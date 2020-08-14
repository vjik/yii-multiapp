<?php

declare(strict_types=1);

/* @var array $params */

use AppMain\ApplicationParameters;

return [
    ApplicationParameters::class => static function () use ($params) {
        return (new ApplicationParameters())
            ->charset($params['app']['charset'])
            ->language($params['app']['language']);
    },
];
