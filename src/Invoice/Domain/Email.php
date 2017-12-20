<?php

declare(strict_types=1);

namespace Invoice\Domain;

class Email
{
    private $email;

    public function __construct(string $email)
    {
        if (!$email) {
            throw new \InvalidArgumentException();
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException();
        }

        $this->email = $email;
    }

    public function __toString()
    {
        return $this->email;
    }
}
