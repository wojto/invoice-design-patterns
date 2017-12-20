<?php

namespace spec\Invoice\Domain;

use Invoice\Domain\User;
use Invoice\Domain\Email;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Class UserSpec
 * @package spec\Invoice\Domain
 * @mixin User
 */
class UserSpec extends ObjectBehavior
{
    function it_is_initializable(Email $email)
    {
        $hash = password_hash('password', PASSWORD_BCRYPT);
        $this->beConstructedWith(
            $email,
            $hash
        );
        // new User('codesensus@gmail.com', 'password');

        $this->email()->shouldBe($email);
        //self::assertEquals('codesensus@gmail.com', $user->getEmail())

        $this->password()->shouldBe($hash);
        //self::assertEquals($hash, $user->getPassword())

        $this->shouldHaveType(User::class);
    }
}
