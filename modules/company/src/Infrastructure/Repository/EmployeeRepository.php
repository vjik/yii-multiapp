<?php

declare(strict_types=1);

namespace Module\Company\Infrastructure\Repository;

use Cycle\ORM\ORMInterface;
use Cycle\ORM\Select;
use Cycle\ORM\Transaction;
use Module\Company\Domain\Entity\Employee;
use Module\Company\Domain\Entity\EmployeeRepositoryInterface;

final class EmployeeRepository implements EmployeeRepositoryInterface
{
    public const ROLE = 'cmp_employee';

    private Transaction $transaction;
    private Select $select;

    public function __construct(ORMInterface $orm)
    {
        $this->transaction = new Transaction($orm);
        $this->select = new Select($orm, self::ROLE);
    }

    public function existsByLogin(string $login): bool
    {
        return $this->select->where('login', $login)->buildQuery()->count('id') > 0;
    }

    public function save(Employee $employee): void
    {
        $this->transaction->persist($employee)->run();
    }
}
