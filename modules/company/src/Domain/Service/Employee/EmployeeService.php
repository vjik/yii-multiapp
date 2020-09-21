<?php

declare(strict_types=1);

namespace Module\Company\Domain\Service\Employee;

use Module\Company\Domain\Entity\Employee;
use Module\Company\Domain\Entity\EmployeeRepositoryInterface;

final class EmployeeService
{
    private EmployeeRepositoryInterface $employees;

    public function __construct(EmployeeRepositoryInterface $employees)
    {
        $this->employees = $employees;
    }

    public function create(string $login, string $password): Employee
    {
        if ($this->employees->existsByLogin($login)) {
            throw new LoginAlreadyExists();
        }
        $employee = new Employee($login, $password);
        $this->employees->save($employee);
        return $employee;
    }
}
