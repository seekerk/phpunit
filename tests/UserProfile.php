<?php
/**
 * Created by PhpStorm.
 * User: kulakov
 * Date: 14.05.18
 * Time: 11:19
 */

require_once 'UserProfile.inc';
use PHPUnit\Framework\TestCase;

class UserProfileTest extends TestCase
{
    protected function setUp()
    {
        parent::setUp();
    }


    public function testCompareCommon()
    {
        $name = '1123656564';
        $pass = 'vr4 4 4jg j4g 4j4 j';
        $user = new UserProfile($name, null, $pass);

        $this->assertTrue($user->compare($name, $pass));
    }

    public function testCompareEmpty()
    {
        $user = new UserProfile(null, null, null);

        $this->assertTrue($user->compare(null, null));
    }

    public function testCompareWrong()
    {
        $name = '1123656564';
        $pass = 'vr4 4 4jg j4g 4j4 j';
        $user = new UserProfile($name, null, $pass);

        $this->assertFalse($user->compare($name, null));
        $this->assertFalse($user->compare(null, $pass));
        $this->assertFalse($user->compare(null, null));
        $this->assertFalse($user->compare($pass, $name));
    }

    public function testPrintProfile()
    {
        $name = '1123656564';
        $pass = 'vr4 4 4jg j4g 4j4 j';
        $user = new UserProfile($name, $pass, $pass);

        $format = "<p>name: $name<br/> email: $pass</p>";

        $this->assertStringMatchesFormat($format, $user->printProfile());
    }

    public function testGetName()
    {
        $name = 'gkg kj jgdfg dlfj gdfl jdflgj dl ';
        $user = new UserProfile($name, null, null);
        $this->assertEquals($name, $user->getName());
    }
}
