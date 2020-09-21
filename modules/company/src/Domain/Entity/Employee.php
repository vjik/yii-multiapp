<?php

declare(strict_types=1);

namespace Module\Company\Domain\Entity;

use LogicException;
use Yiisoft\Security\PasswordHasher;

final class Employee
{
    private ?int $id = null;
    private string $login;
    private string $passwordHash;

    public function __construct(string $login, string $password)
    {
        $this->login = $login;
        $this->setPassword($password);
    }

    public function getId(): int
    {
        if ($this->id === null) {
            throw new LogicException('ID not available for new employee.');
        }
        return $this->id;
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
