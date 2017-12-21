<?php

declare(strict_types=1);

namespace Invoice\Application\UseCase\RegisterUser;

use Invoice\Domain\Email;
use Invoice\Domain\User;

final class DefaultResponder implements Responder
{
    public function userWasRegistered(User $user): void
    {
    }

    public function userWithSameEmailAlreadyExists(
        Email $email
    ): void
    {
    }

    public function emailIsEmpty(): void
    {
        // TODO: Implement emailIsEmpty() method.
    }

    public function emailIsNotValid(): void
    {
        // TODO: Implement emailIsNotValid() method.
    }

    public function passwordIsEmpty(): void
    {
        // TODO: Implement passwordIsEmpty() method.
    }

    public function passwordIsNotValid(): void
    {
        // TODO: Implement passwordIsNotValid() method.
    }
}