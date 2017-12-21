<?php

namespace spec\Invoice\Domain;

use InvalidArgumentException;
use Invoice\Domain\Email;
use Invoice\Domain\Exception\EmailIsEmpty;
use Invoice\Domain\Exception\EmailIsNotValid;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * @mixin Email
 */
class EmailSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->beConstructedWith('leszek.prabucki@gmail.com');

        $this->__toString()->shouldBe('leszek.prabucki@gmail.com');
    }

    function it_throws_invalid_argument_exception_for_empty_email()
    {
        $this->beConstructedWith('');

        $this->shouldThrow(EmailIsEmpty::class)->duringInstantiation();
    }

    function it_throws_invalid_argument_exception_for_email_is_not_valid()
    {
        $this->beConstructedWith('not-valid');

        $this->shouldThrow(EmailIsNotValid::class)->duringInstantiation();
    }
}
