<?php

declare(strict_types=1);

use Cycle\ORM\Schema;
use Module\Company\Domain\Entity\Employee;
use Module\Company\Infrastructure\Repository\EmployeeRepository;

return [
    'cmp_employee' => [
        Schema::ENTITY => Employee::class,
        Schema::REPOSITORY => EmployeeRepository::class,
        Schema::TABLE => 'employee',
        Schema::PRIMARY_KEY => 'id',
        Schema::COLUMNS => [
            'id' => 'id',
            'login' => 'login',
            'passwordHash' => 'password_hash',
        ],
        Schema::TYPECAST => [
            'id' => 'int',
        ],
        Schema::RELATIONS => [],
    ],
];
