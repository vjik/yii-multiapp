<?php

namespace Domain\Company\Repository;

use Common\Repository\NotFoundException;
use Cycle\ORM\RepositoryInterface;
use Cycle\ORM\Select;
use Cycle\ORM\Transaction;
use Domain\Company\Entity\Employee;
use RuntimeException;
use Yiisoft\Auth\IdentityInterface;
use Yiisoft\Auth\IdentityRepositoryInterface;
use Yiisoft\Yii\Cycle\Command\CycleDependencyProxy;

final class EmployeeRepository implements
    IdentityRepositoryInterface,
    RepositoryInterface
{

    private Select $select;
    private CycleDependencyProxy $promise;

    public function __construct(
        Select $select,
        CycleDependencyProxy $promise
    ) {
        $this->select = $select;
        $this->promise = $promise;
    }

    /**
     * @param string $id
     * @return Employee
     * @throws NotFoundException
     */
    public function get(string $id): Employee
    {
        $employee = $this->findByPK($id);
        if ($employee === null) {
            throw new NotFoundException('Employee not found.');
        }
        return $employee;
    }

    /**
     * @param Employee $employee
     * @throws \Throwable
     */
    public function save(Employee $employee)
    {
        $transaction = new Transaction($this->promise->getORM());
        $transaction->persist($employee);
        $transaction->run();
    }

    public function findIdentity(string $id): ?IdentityInterface
    {
        /** @var ?IdentityInterface $identity */
        return $this->findByPK($id);
    }

    public function findIdentityByToken(string $token, string $type): ?IdentityInterface
    {
        throw new RuntimeException('"findIdentityByToken" is not implemented.');
    }

    /**
     * @param mixed $id
     * @return ?Employee
     */
    public function findByPK($id)
    {
        /** @var ?Employee $object */
        $object = $this->select()->wherePK($id)->fetchOne();
        return $object;
    }

    /**
     * @param array $scope
     * @return ?Employee
     */
    public function findOne(array $scope = [])
    {
        /** @var ?Employee $object */
        $object = $this->select()->fetchOne($scope);
        return $object;
    }

    /**
     * @param array $scope
     * @param array $orderBy
     * @return Employee[]|iterable
     */
    public function findAll(array $scope = [], array $orderBy = []): iterable
    {
        return $this->select()->where($scope)->orderBy($orderBy)->fetchAll();
    }

    private function select(): Select
    {
        return clone $this->select;
    }
}