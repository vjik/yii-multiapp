<?php

declare(strict_types=1);

namespace Module\Company\Domain\Entity;

use Common\Repository\NotFoundException;
use Throwable;

interface EmployeeRepositoryInterface
{
    /**
     * @param string $id
     * @return Employee
     * @throws NotFoundException
     */
    public function get(string $id): Employee;

    /**
     * @param Employee $employee
     * @throws Throwable
     */
    public function save(Employee $employee);
}
