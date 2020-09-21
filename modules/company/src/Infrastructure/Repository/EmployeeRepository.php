<?php

declare(strict_types=1);

namespace Module\Company\Infrastructure\Repository;

use Cycle\ORM\ORMInterface;
use Cycle\ORM\Transaction;
use Module\Company\Domain\Entity\Employee;
use Module\Company\Domain\Entity\EmployeeRepositoryInterface;
use Throwable;

final class EmployeeRepository implements EmployeeRepositoryInterface
{
    private Transaction $transaction;

    public function __construct(ORMInterface $orm)
    {
        $this->transaction = new Transaction($orm);
    }

    /**
     * @param Employee $employee
     * @throws Throwable
     */
    public function save(Employee $employee): void
    {
        $this->transaction->persist($employee)->run();
    }
}
