<?php

/**
 * ValidationStrategyUpperCaseTest.php
 *
 * @package BunyipFormBuilder
 */

namespace BunyipFormBuilder;

use PHPUnit\Framework\TestCase;
use BunyipFormBuilder\strategies\ValidationStrategyUpperCase;

class ValidationStrategyUpperCaseTest extends TestCase
{
    protected ValidationStrategyUpperCase $object;

    protected function setUp(): void
    {
        $this->object = new ValidationStrategyUpperCase(4);
    }

    protected function tearDown(): void
    {
    }

    public function testTestPasses(): void
    {
        $this->assertTrue($this->object->test('ABCDEFG'));
    }

    public function testTestFailAllLowercase(): void
    {
        $this->assertFalse($this->object->test('abcdefg'));
    }

    public function testTestFailTooFew(): void
    {
        $this->assertFalse($this->object->test('ABC'));
    }

    public function testTestFailNoLetters(): void
    {
        $this->assertFalse($this->object->test('12341234'));
    }

    public function testGetMessage(): void
    {
        $this->assertEquals('Must contain at least 4 upper case characters', $this->object->getMessage());
    }
}
