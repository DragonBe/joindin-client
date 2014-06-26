<?php
namespace Joindinc\Users;


class RequestTest extends \PHPUnit_Framework_TestCase
{
    public function testClientCanFindUsersById()
    {
        $request = new Request();
        $user = $request->findUserById(19);

        $this->assertEquals('DragonBe', $user->username);
        $this->assertEquals('Michelangelo van Dam', $user->full_name);
    }
} 