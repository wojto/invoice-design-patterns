<?php
/**
 * Created by PhpStorm.
 * User: wojto
 * Date: 20.12.17
 * Time: 13:01
 */

namespace tests\Invoice\Domain;

use Invoice\Domain\PasswordHash;
use PHPUnit\Framework\TestCase;

class PasswordHashTest extends TestCase
{
    /**
     * @param string $passwordHash
     * @dataProvider invalidpasswordHashes
     */
    public function testThatCannotBeCreatedFromInvalidPasswordHash(string $passwordHash)
    {
        $this->expectException(\InvalidArgumentException::class);

        new PasswordHash($passwordHash);
    }

    public function invalidPasswordHashes(): array
    {
        return [
            ['a'],
            [''],
            ['#']
        ];
    }
}
