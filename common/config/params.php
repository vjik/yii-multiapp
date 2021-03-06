<?php

declare(strict_types=1);

use Common\CommonParameters;
use Psr\Log\LogLevel;
use Yiisoft\Composer\Config\Builder;

return [
    'aliases' => [
        '@root' => dirname(__DIR__, 2),
        '@common' => '@root/common',
        '@modules' => '@root/modules',
        '@runtime' => '@root/runtime',
    ],

    'yiisoft/log-target-file' => [
        'file-target' => [
            'file' => '@runtime/logs/app.log',
            'levels' => [
                LogLevel::EMERGENCY,
                LogLevel::ERROR,
                LogLevel::WARNING,
                LogLevel::INFO,
                LogLevel::DEBUG,
            ],
        ],
        'file-rotator' => [
            'maxfilesize' => 10,
            'maxfiles' => 5,
            'filemode' => null,
            'rotatebycopy' => null
        ],
    ],

    'yiisoft/view' => [
        'basePath' => null, // Should be overwritted in app params
        'defaultParameters' => [
            'commonParameters' => CommonParameters::class,
            // @todo Разобраться
//            'assetManager' => AssetManager::class,
//            'field' => Field::class,
//            'url' => UrlGeneratorInterface::class,
//            'urlMatcher' => UrlMatcherInterface::class,
        ],
        'theme' => [
            'pathMap' => [],
            'basePath' => '',
            'baseUrl' => '',
        ]
    ],

    'yiisoft/yii-console' => [
        'commands' => [
            'employee/create' => \Console\Command\Employee\CreateCommand::class,
        ],
    ],

    'yiisoft/yii-web' => [
        'session' => [
            'options' => ['cookie_secure' => 0],
            'handler' => null
        ],
    ],

    'yiisoft/yii-cycle' => [
        'dbal' => [
            'query-logger' => null,
            'default' => 'default',
            'aliases' => [],
            'databases' => [
                'default' => ['connection' => 'mysql']
            ],
        ],
        'migrations' => [
            'directory' => '@common/migrations',
            'namespace' => 'Common\\Migration',
            'table' => 'migration',
            'safe' => false,
        ],

        /**
         * Список поставщиков схемы БД для {@see \Yiisoft\Yii\Cycle\Schema\SchemaManager}
         * Поставщики схемы реализуют класс {@see SchemaProviderInterface}.
         * Конфигурируется перечислением имён классов поставщиков. Вы здесь можете конфигурировать также и поставщиков,
         * указывая имя класса поставщика в качестве ключа элемента, а конфиг в виде массива элемента:
         */
        'schema-providers' => [
//            \Yiisoft\Yii\Cycle\Schema\Provider\SimpleCacheSchemaProvider::class => [
//                'key' => 'my-custom-cache-key'
//            ],
            \Yiisoft\Yii\Cycle\Schema\Provider\FromFilesSchemaProvider::class => [
                'files' => [Builder::path('cycle-schema')],
                'strict' => true,
            ],
        ],
        'annotated-entity-paths' => [
            '@modules/company/src/Domain/Entity',
        ],
    ],
];
