<?php

/**
 * ValidationStrategyLengthTest.php
 *
 * @package BunyipFormBuilder
 */

namespace BunyipFormBuilder;

use PHPUnit\Framework\TestCase;
use BunyipFormBuilder\strategies\ValidationStrategyLength;

class ValidationStrategyLengthTest extends TestCase
{
    protected ValidationStrategyLength $object;

    protected function setUp(): void
    {
        $this->object = new ValidationStrategyLength(4);
    }

    protected function tearDown(): void
    {
    }

    public function testTestPasses(): void
    {
        $this->assertTrue($this->object->test('abc12345'));
    }

    public function testTestFailTooFew(): void
    {
        $this->assertFalse($this->object->test('12ab'));
    }

    public function testGetMessage(): void
    {
        $this->assertEquals('Needs to be more than 4 characters long', $this->object->getMessage());
    }
}
