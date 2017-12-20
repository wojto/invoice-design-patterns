<?php

namespace spec\Invoice\Domain;

use Invoice\Domain\User;
use Invoice\Domain\Email;
use Invoice\Domain\PasswordHash;
use PhpSpec\ObjectBehavior;

/**
 * Class UserSpec
 * @package spec\Invoice\Domain
 * @mixin User
 */
class UserSpec extends ObjectBehavior
{
    public function it_is_initializable(Email $email, PasswordHash $passwordHash)
    {
        $this->beConstructedWith(
            $email,
            $passwordHash
        );
        // new User('codesensus@gmail.com', 'password');

        $this->email()->shouldBe($email);
        //self::assertEquals('codesensus@gmail.com', $user->getEmail())

        $this->password()->shouldBe($passwordHash);
        //self::assertEquals($hash, $user->getPassword())

        $this->shouldHaveType(User::class);
    }
}
