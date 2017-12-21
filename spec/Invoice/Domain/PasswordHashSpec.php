<?php

namespace spec\Invoice\Domain;

use Invoice\Domain\Exception\PasswordIsEmpty;
use Invoice\Domain\Exception\PasswordIsNotValid;
use Invoice\Domain\PasswordHash;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * @mixin PasswordHash
 */
class PasswordHashSpec extends ObjectBehavior
{
    function it_is_initializable_from_plain_password()
    {
        $this->beConstructedThrough('fromPlainPassword', ['123']);

        $this->__toString()->shouldHavePasswordMatch('123');
    }

    function it_is_initializable_from_hashed_password()
    {
        $hash = password_hash('123', PASSWORD_BCRYPT);
        $this->beConstructedThrough('fromHashedPassword', [$hash]);

        $this->__toString()->shouldBe($hash);
    }

    function it_throws_invalid_argument_exception_for_empty_password()
    {
        $this->beConstructedThrough('fromPlainPassword', ['']);

        $this->shouldThrow(PasswordIsEmpty::class)->duringInstantiation();
    }

    function it_throws_invalid_argument_exception_for_password_is_not_valid()
    {
        $this->beConstructedThrough('fromPlainPassword', ['a']);

        $this->shouldThrow(PasswordIsNotValid::class)->duringInstantiation();
    }

    function getMatchers(): array
    {
        return [
            'havePasswordMatch' => function (string $hash, string $password) {
                return password_verify($password, $hash);
            }
        ];
    }
}
