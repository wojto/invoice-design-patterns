<?php

declare(strict_types=1);

namespace Invoice\Domain;

use Invoice\Domain\Exception\PasswordIsEmpty;
use Invoice\Domain\Exception\PasswordIsNotValid;

class PasswordHash
{
    private $hash;

    private function __construct(string $hash)
    {
        $this->hash = $hash;
    }

    public static function fromHashedPassword(string $password): PasswordHash
    {
        static::validate($password);

        return new PasswordHash($password);
    }

    public static function fromPlainPassword(string $password): PasswordHash
    {
        static::validate($password);

        return new PasswordHash(password_hash($password, PASSWORD_BCRYPT));
    }

    public static function validate(string $password)
    {
        if (!$password) {
            throw new PasswordIsEmpty();
        }

        if (strlen($password) <= 1) {
            throw new PasswordIsNotValid();
        }
    }

    public function __toString(): string
    {
        return $this->hash;
    }
}