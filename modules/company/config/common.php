<?php

declare(strict_types=1);

use Module\Company\Domain\Entity\EmployeeRepositoryInterface;
use Module\Company\Infrastructure\Repository\EmployeeRepository;

return [
    EmployeeRepositoryInterface::class => EmployeeRepository::class,
];
