<?php

declare(strict_types=1);

namespace Module\Company\Api\Employee;

use Module\Company\Api\Dto\Employee\CreateEmployee\CreateEmployeeDto;
use Module\Company\Api\Dto\Employee\Employee\EmployeeDto;
use Module\Company\Api\Dto\Employee\Employee\EmployeeDtoFactory;
use Module\Company\Domain\Service\Employee\EmployeeService;

final class CreateEmployee
{
    private EmployeeService $employeeService;
    private EmployeeDtoFactory $employeeDtoFactory;

    public function __construct(
        EmployeeService $employeeService,
        EmployeeDtoFactory $employeeDtoFactory
    ) {
        $this->employeeService = $employeeService;
        $this->employeeDtoFactory = $employeeDtoFactory;
    }

    public function handle(CreateEmployeeDto $dto): EmployeeDto
    {
        $employee = $this->employeeService->create($dto->login, $dto->password);
        return $this->employeeDtoFactory->make($employee);
    }
}
