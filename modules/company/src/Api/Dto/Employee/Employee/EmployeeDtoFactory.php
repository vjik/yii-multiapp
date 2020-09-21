<?php

declare(strict_types=1);

namespace Module\Company\Api\Dto\Employee\Employee;

use Module\Company\Domain\Entity\Employee;

final class EmployeeDtoFactory
{
    public function make(Employee $employee): EmployeeDto
    {
        $dto = new EmployeeDto();
        $dto->id = $employee->getId();
        $dto->login = $employee->getLogin();
        return $dto;
    }
}
