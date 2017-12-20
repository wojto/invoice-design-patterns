<?php
/**
 * Created by PhpStorm.
 * User: wojto
 * Date: 20.12.17
 * Time: 13:01
 */

namespace tests\Invoice\Domain;

use Invoice\Domain\Email;
use PHPUnit\Framework\TestCase;

class EmailTest extends TestCase
{
    /**
     * @param string $email
     * @dataProvider invalidEmails
     */
    public function testThatCannotBeCreatedFromInvalidEmail(string $email)
    {
        $this->expectException(\InvalidArgumentException::class);

        new Email($email);
    }

    public function invalidEmails(): array
    {
        return [
            ['invalid-email'],
            [''],
            ['codesensus@'],
            ['codesensus@gmail']
        ];
    }
}
