<?php

declare(strict_types=1);

namespace Module\Company\Domain\Entity;

interface EmployeeRepositoryInterface
{
    public function existsByLogin(string $login): bool;

    public function save(Employee $employee);
}
