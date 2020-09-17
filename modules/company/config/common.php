<?php

declare(strict_types=1);

use Cycle\ORM\ORMInterface;
use Module\Company\Domain\Entity\Employee;
use Module\Company\Domain\Entity\EmployeeRepositoryInterface;
use Module\Company\Infrastructure\Repository\EmployeeRepository;
use Psr\Container\ContainerInterface;

return [
    EmployeeRepositoryInterface::class => EmployeeRepository::class,

    EmployeeRepository::class => static function (ContainerInterface $container) {
        return $container->get(ORMInterface::class)->getRepository(Employee::class);
    }
];
