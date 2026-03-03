<?php

/**
 * ValidationStrategyPunctuationTest.php
 *
 * @package BunyipFormBuilder
 */

namespace BunyipFormBuilder;

use PHPUnit\Framework\TestCase;
use BunyipFormBuilder\strategies\ValidationStrategyPunctuation;

class ValidationStrategyPunctuationTest extends TestCase
{
    protected ValidationStrategyPunctuation $object;

    protected function setUp(): void
    {
        $this->object = new ValidationStrategyPunctuation(4);
    }

    protected function tearDown(): void
    {
    }

    public function testTestPasses(): void
    {
        $this->assertTrue($this->object->test('( ) * + ,'));
    }

    public function testTestFailTooFew(): void
    {
        $this->assertFalse($this->object->test('( )'));
    }

    public function testTestFailNoPunctuation(): void
    {
        $this->assertFalse($this->object->test('12341234'));
    }

    public function testGetMessage(): void
    {
        $this->assertEquals('Must contain at least 4 punctuation symbols', $this->object->getMessage());
    }
}
