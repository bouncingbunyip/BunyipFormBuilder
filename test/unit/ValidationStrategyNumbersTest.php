<?php
/**
 * Generated by PHPUnit_SkeletonGenerator on 2017-01-23 at 16:15:38.
 */

include  'lib/ValidationStrategyNumbers.php';

class ValidationStrategyNumbersTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var ValidationStrategyNumbers
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new ValidationStrategyNumbers(4);
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers ValidationStrategyNumbers::test
     */
    public function testTest()
    {
        $rs = $this->object->test('12345');
        $this->assertTrue($rs);
    }

    public function testTestFailTooFew()
    {
        $rs = $this->object->test('123');
        $this->assertFalse($rs);
    }

    public function testTestFailNoNumbers()
    {
        $rs = $this->object->test('abcdefg');
        $this->assertFalse($rs);
    }

    /**
     * @covers ValidationStrategyNumbers::getMessage
     */
    public function testGetMessage()
    {
        $expect = 'Must contain at least 4 numbers';
        $actual = $this->object->getMessage();
        $this->assertEquals($expect, $actual);
    }
}
