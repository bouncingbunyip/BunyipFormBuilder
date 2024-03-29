<?php
/**
 * Generated by PHPUnit_SkeletonGenerator on 2017-01-23 at 16:15:38.
 */

include  'lib/ValidationStrategyPunctuation.php';

class ValidationStrategyPunctuationTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var ValidationStrategyPunctuation
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new ValidationStrategyPunctuation(4);
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers ValidationStrategyPunctuation::test
     */
    public function testTest()
    {
        $rs = $this->object->test('( ) * + ,');
        $this->assertTrue($rs);
    }

    public function testTestFailTooFew()
    {
        $rs = $this->object->test('( )');
        $this->assertFalse($rs);
    }

    public function testTestFailNoPunctuation()
    {
        $rs = $this->object->test('12341234');
        $this->assertFalse($rs);
    }

    /**
     * @covers ValidationStrategyPunctuation::getMessage
     */
    public function testGetMessage()
    {
        $expect = 'Must contain at least 4 punctuation symbols';
        $actual = $this->object->getMessage();
        $this->assertEquals($expect, $actual);
    }
}
