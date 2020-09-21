<?php

declare(strict_types=1);

namespace Module\Company\Domain\Entity;

use Yiisoft\Auth\IdentityInterface;
use Yiisoft\Security\PasswordHasher;

class Employee implements IdentityInterface
{
    private ?int $id = null;
    private string $login;
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
