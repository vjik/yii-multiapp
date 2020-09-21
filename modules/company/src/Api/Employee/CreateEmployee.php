<?php

declare(strict_types=1);

namespace Module\Company\Api\Employee;

use Module\Company\Api\Dto\Employee\CreateEmployee\CreateEmployeeDto;
use Module\Company\Api\Dto\Employee\Employee\EmployeeDto;
use Module\Company\Api\Dto\Employee\Employee\EmployeeDtoFactory;
use Module\Company\Application\Employee\EmployeeService;
use Throwable;

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

    /**
     * @param CreateEmployeeDto $dto
     * @return EmployeeDto
     * @throws Throwable
     */
    public function handle(CreateEmployeeDto $dto): EmployeeDto
    {
        $employee = $this->employeeService->create($dto);
        return $this->employeeDtoFactory->make($employee);
    }
}
