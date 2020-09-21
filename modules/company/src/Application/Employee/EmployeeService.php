<?php

declare(strict_types=1);

namespace Module\Company\Application\Employee;

use Module\Company\Api\Dto\Employee\CreateEmployee\CreateEmployeeDto;
use Module\Company\Domain\Entity\Employee;
use Module\Company\Domain\Entity\EmployeeRepositoryInterface;
use Throwable;

final class EmployeeService
{
    private EmployeeRepositoryInterface $employees;

    public function __construct(EmployeeRepositoryInterface $employees)
    {
        $this->employees = $employees;
    }

    /**
     * @param CreateEmployeeDto $dto
     * @return Employee
     * @throws Throwable
     */
    public function create(CreateEmployeeDto $dto): Employee
    {
        $employee = new Employee($dto->login, $dto->password);
        $this->employees->save($employee);
        return $employee;
    }
}
