<?php

/**
 * ValidationStrategyPhoneUsaTest.php
 *
 * @version $Id: $
 * @package BunyipFormBuilder
 * @copyright 2011 - 2020
 */
include  'lib/ValidationStrategyInterface.php';
include  'lib/ValidationStrategyPhoneUsa.php';

class ValidationStrategyPhoneUsaTest extends PHPUnit_Framework_TestCase
{

    protected function setUp()
    {
        $this->validator = new ValidationStrategyPhoneUsa();
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        $this->validator = null;
    }

    /**
     * tests the main 'test' method on the validation class with common formats
     */
    public function testTest()
    {
        $examples = array(
            '415.902.2146',
            '(415) 902 2146',
            '415 902 2146',
            '414-902-2146',
            '(415) 902-2146',
            '4159022146'
        );
        foreach ($examples as $data) {
            $this->assertTrue($this->validator->test($data));
        }
    }

    public function testWeirdFormatTest()
    {
        $examples = array(
            '415..902..2146',
        );
        foreach ($examples as $data) {
            $this->assertTrue($this->validator->test($data));
        }
    }
}
