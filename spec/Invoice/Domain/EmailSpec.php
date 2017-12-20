<?php

namespace spec\Invoice\Domain;

use Invoice\Domain\Email;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Class EmailSpec
 * @package spec\Invoice\Domain
 * @mixin Email
 */
class EmailSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->beConstructedWith('codesensus@gmail.com');
        $this->__toString()->shouldBe('codesensus@gmail.com');

        $this->shouldHaveType(Email::class);
    }

    function it_throws_invalid_argument_exception_for_empty_mail()
    {
        $this->beConstructedWith('');

        $this->shouldThrow(\InvalidArgumentException::class)->duringInstantiation();
    }

    function it_throws_invalid_argument_exception_for_not_valid_email()
    {
        $this->beConstructedWith('not-valid');

        $this->shouldThrow(\InvalidArgumentException::class)->duringInstantiation();
    }
}
