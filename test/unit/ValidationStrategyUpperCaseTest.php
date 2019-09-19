<?php
/**
 * Generated by PHPUnit_SkeletonGenerator on 2017-01-23 at 16:15:38.
 */

include OGL_PATH . 'lib/ValidationStrategyUpperCase.php';

class ValidationStrategyUpperCaseTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var ValidationStrategyUpperCase
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new ValidationStrategyUpperCase(4);
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers ValidationStrategyUpperCase::test
     */
    public function testTest()
    {
        $rs = $this->object->test('ABCDEFG');
        $this->assertTrue($rs);
    }

    public function testTestFailAllLowercase()
    {
        $rs = $this->object->test('abcdefg');
        $this->assertFalse($rs);
    }

    public function testTestFailTooFew()
    {
        $rs = $this->object->test('ABC');
        $this->assertFalse($rs);
    }

    public function testTestFailNoLetters()
    {
        $rs = $this->object->test('12341234');
        $this->assertFalse($rs);
    }

    /**
     * @covers ValidationStrategyUpperCase::getMessage
     */
    public function testGetMessage()
    {
        $expect = 'Must contain at least 4 upper case characters';
        $actual = $this->object->getMessage();
        $this->assertEquals($expect, $actual);
    }
}
