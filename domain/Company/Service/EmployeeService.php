<?php

namespace Domain\Company\Service;

use Domain\Company\Entity\Employee;
use Domain\Company\Repository\EmployeeRepository;

class EmployeeService
{

    private EmployeeRepository $employees;

    public function __construct(EmployeeRepository $employees)
    {
        $this->employees = $employees;
    }

    /**
     * @param string $login
     * @param string $password
     * @return Employee
     * @throws \Throwable
     */
    public function create(string $login, string $password): Employee
    {
        $employee = new Employee($login, $password);
        $this->employees->save($employee);
        return $employee;
    }
}
