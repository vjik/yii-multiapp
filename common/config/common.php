<?php

declare(strict_types=1);

/* @var array $params */

use Cycle\ORM\Factory;
use Cycle\ORM\FactoryInterface;
use Cycle\ORM\ORMInterface;
use Domain\Company\Entity\Employee;
use Domain\Company\Repository\EmployeeRepository;
use Psr\Container\ContainerInterface;
use Spiral\Database\DatabaseManager;
use Yiisoft\Aliases\Aliases;

return [
    ContainerInterface::class => static function (ContainerInterface $container) {
        return $container;
    },

    Aliases::class => [
        '__class' => Aliases::class,
        '__construct()' => [$params['aliases']],
    ],

    /** @todo Remove after fix https://github.com/yiisoft/yii-cycle/issues/50 */
    FactoryInterface::class => static function (ContainerInterface $container) {
        return new Factory(
            $container->get(DatabaseManager::class),
            null,
            $container->get(\Common\CycleFactory::class),
            $container
        );
    },

    EmployeeRepository::class => static function (ContainerInterface $container) {
        return $container->get(ORMInterface::class)->getRepository(Employee::class);
    }
];
