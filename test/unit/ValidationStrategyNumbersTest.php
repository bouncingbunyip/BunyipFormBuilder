<?php

/**
 * ValidationStrategyNumbersTest.php
 *
 * @package BunyipFormBuilder
 */

namespace BunyipFormBuilder;

use PHPUnit\Framework\TestCase;
use BunyipFormBuilder\strategies\ValidationStrategyNumbers;

class ValidationStrategyNumbersTest extends TestCase
{
    protected ValidationStrategyNumbers $object;

    protected function setUp(): void
    {
        $this->object = new ValidationStrategyNumbers(4);
    }

    protected function tearDown(): void
    {
    }

    public function testTestPasses(): void
    {
        $this->assertTrue($this->object->test('12345'));
    }

    public function testTestFailTooFew(): void
    {
        $this->assertFalse($this->object->test('123'));
    }

    public function testTestFailNoNumbers(): void
    {
        $this->assertFalse($this->object->test('abcdefg'));
    }

    public function testGetMessage(): void
    {
        $this->assertEquals('Must contain at least 4 numbers', $this->object->getMessage());
    }
}
