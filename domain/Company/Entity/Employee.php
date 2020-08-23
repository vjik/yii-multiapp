<?php

namespace Domain\Company\Entity;

use Cycle\Annotated\Annotation\Column;
use Cycle\Annotated\Annotation\Entity;
use Cycle\Annotated\Annotation\Table;
use Cycle\Annotated\Annotation\Table\Index;
use Yiisoft\Auth\IdentityInterface;
use Yiisoft\Security\PasswordHasher;

/**
 * @Entity(
 *     role="employee",
 *     table="employee",
 *     repository="\Domain\Company\Repository\EmployeeRepository"
 * )
 * @Table(
 *     indexes={
 *         @Index(columns={"login"}, unique=true),
 *     }
 * )
 */
class Employee implements IdentityInterface
{

    /**
     * @Column(type="primary")
     */
    private ?int $id = null;

    /**
     * @Column(type="string(48)")
     */
    private string $login;

    /**
     * @Column(name="password_hash",type="string(191)")
     */
    private string $passwordHash;

    public function __construct(string $login, string $password)
    {
        $this->login = $login;
        $this->setPassword($password);
    }

    public function getId(): ?string
    {
        return $this->id === null ? null : (string)$this->id;
    }

    public function getLogin(): string
    {
        return $this->login;
    }

    public function setLogin(string $login): void
    {
        $this->login = $login;
    }

    public function setPassword(string $password): void
    {
        $this->passwordHash = (new PasswordHasher())->hash($password);
    }
}
