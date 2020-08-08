<?php

declare(strict_types=1);

use Common\CommonParameters;
use Psr\Log\LogLevel;

return [
    'aliases' => [
        '@root' => dirname(__DIR__, 2),
        '@common' => '@root/common',
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

    'yiisoft/yii-web' => [
        'session' => [
            'options' => ['cookie_secure' => 0],
            'handler' => null
        ],
    ],

    // Общий конфиг Cycle
    'yiisoft/yii-cycle' => [

        // Конфиг Cycle DBAL
        'dbal' => [
            /**
             * Логгер SQL запросов
             * Вы можете использовать класс {@see \Yiisoft\Yii\Cycle\Logger\StdoutQueryLogger}, чтобы выводить SQL лог
             * в stdout, или любой другой PSR-совместимый логгер
             */
            'query-logger' => null,
            // БД по умолчанию (из списка 'databases')
            'default' => 'default',
            'aliases' => [],
            'databases' => [
                'default' => ['connection' => 'mysql']
            ],
        ],

        /**
         * Список поставщиков схемы БД для {@see \Yiisoft\Yii\Cycle\Schema\SchemaManager}
         * Поставщики схемы реализуют класс {@see SchemaProviderInterface}.
         * Конфигурируется перечислением имён классов поставщиков. Вы здесь можете конфигурировать также и поставщиков,
         * указывая имя класса поставщика в качестве ключа элемента, а конфиг в виде массива элемента:
         */
        'schema-providers' => [
            \Yiisoft\Yii\Cycle\Schema\Provider\SimpleCacheSchemaProvider::class => [
                'key' => 'my-custom-cache-key'
            ],
            \Yiisoft\Yii\Cycle\Schema\Provider\FromFileSchemaProvider::class => [
                'file' => '@runtime/cycle-schema.php'
            ],
            \Yiisoft\Yii\Cycle\Schema\Provider\FromConveyorSchemaProvider::class,
        ],

        /**
         * Настройка для класса {@see \Yiisoft\Yii\Cycle\Schema\Conveyor\AnnotatedSchemaConveyor}
         * Здесь указывается список папок с сущностями.
         * В путях поддерживаются псевдонимы {@see \Yiisoft\Aliases\Aliases}.
         */
        'annotated-entity-paths' => [],
    ],

    // @todo Use merge params when added https://github.com/yiisoft/composer-config-plugin/issues/99
    'app-main' => require dirname(__DIR__, 2) . '/app-main/config/params.php',
];
