<?php

declare(strict_types=1);

return [
    'yiisoft/yii-cycle' => [
        'dbal' => [
            'connections' => [
                'mysql' => [
                    'driver' => \Spiral\Database\Driver\MySQL\MySQLDriver::class,
                    'connection' => 'mysql:host=localhost;dbname=',
                    'username' => '',
                    'password' => '',
                ]
            ],
        ],
    ],
];
