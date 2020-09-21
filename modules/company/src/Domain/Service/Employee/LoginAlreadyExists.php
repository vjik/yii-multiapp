<?php

declare(strict_types=1);

namespace Module\Company\Domain\Service\Employee;

use LogicException;

final class LoginAlreadyExists extends LogicException
{
    public function __construct()
    {
        parent::__construct('Employee with such login already exists.');
    }
}
