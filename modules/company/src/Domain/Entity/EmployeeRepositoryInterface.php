<?php

declare(strict_types=1);

namespace Module\Company\Domain\Entity;

use Throwable;

interface EmployeeRepositoryInterface
{
    /**
     * @param Employee $employee
     * @throws Throwable
     */
    public function save(Employee $employee);
}
