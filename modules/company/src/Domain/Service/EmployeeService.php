<?php

declare(strict_types=1);

namespace Module\Company\Domain\Service;

use Module\Company\Domain\Entity\Employee;
use Module\Company\Domain\Entity\EmployeeRepositoryInterface;
use Throwable;

class EmployeeService
{
    private EmployeeRepositoryInterface $employees;

    public function __construct(EmployeeRepositoryInterface $employees)
    {
        $this->employees = $employees;
    }

    /**
     * @param string $login
     * @param string $password
     * @return Employee
     * @throws Throwable
     */
    public function create(string $login, string $password): Employee
    {
        $employee = new Employee($login, $password);
        $this->employees->save($employee);
        return $employee;
    }
}
