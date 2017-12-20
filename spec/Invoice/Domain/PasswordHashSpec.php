<?php

namespace spec\Invoice\Domain;

use Invoice\Domain\PasswordHash;
use PhpSpec\ObjectBehavior;

class PasswordHashSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $hash = password_hash('test123', PASSWORD_BCRYPT);

        $this->beConstructedWith($hash);
        $this->__toString()->shouldBe($hash);

        $this->shouldHaveType(PasswordHash::class);
    }

    function it_throws_invalid_argument_exception_for_empty_password_hash()
    {
        $this->beConstructedWith('');

        $this->shouldThrow(\InvalidArgumentException::class)->duringInstantiation();
    }

    function it_throws_invalid_argument_exception_for_not_valid_password_hash()
    {
        $this->beConstructedWith('1');

        $this->shouldThrow(\InvalidArgumentException::class)->duringInstantiation();
    }
}
