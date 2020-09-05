<?php

declare(strict_types=1);

/* @var array $params */

use Cycle\ORM\ORMInterface;
use Domain\Company\Entity\Employee;
use Domain\Company\Repository\EmployeeRepository;
use Psr\Container\ContainerInterface;
use Yiisoft\Aliases\Aliases;

return [
    ContainerInterface::class => static function (ContainerInterface $container) {
        return $container;
    },

    Aliases::class => [
        '__class' => Aliases::class,
        '__construct()' => [$params['aliases']],
    ],

    EmployeeRepository::class => static function (ContainerInterface $container) {
        return $container->get(ORMInterface::class)->getRepository(Employee::class);
    }
];
