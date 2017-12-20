<?php

declare(strict_types=1);

namespace Invoice\Domain;

class PasswordHash
{
    private $passwordHash;

    public function __construct(string $passwordHash)
    {
        if (!$passwordHash) {
            throw new \InvalidArgumentException();
        }

        if (strlen($passwordHash) <= 1) {
            throw new \InvalidArgumentException();
        }

        $this->passwordHash = $passwordHash;
    }

    public function __toString()
    {
        return $this->passwordHash;
    }
}
