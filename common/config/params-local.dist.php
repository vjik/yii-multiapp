<?php

declare(strict_types=1);

return [
    'yiisoft/yii-cycle' => [
        'dbal' => [
            'connections' => [
                'mysql' => [
                    'driver' => \Spiral\Database\Driver\MySQL\MySQLDriver::class,
                    /** @see https://www.php.net/manual/ru/ref.pdo-mysql.connection.php */
                    'connection' => 'mysql:host=localhost;dbname=',
                    'username' => '',
                    'password' => '',
                ]
            ],
        ],
    ],
];
