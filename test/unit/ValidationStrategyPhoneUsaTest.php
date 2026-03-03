<?php

/**
 * ValidationStrategyPhoneUsaTest.php
 *
 * @package BunyipFormBuilder
 */

namespace BunyipFormBuilder;

use PHPUnit\Framework\TestCase;
use BunyipFormBuilder\strategies\ValidationStrategyPhoneUsa;

class ValidationStrategyPhoneUsaTest extends TestCase
{
    protected ValidationStrategyPhoneUsa $validator;

    protected function setUp(): void
    {
        $this->validator = new ValidationStrategyPhoneUsa();
    }

    protected function tearDown(): void
    {
    }

    public function testCommonFormats(): void
    {
        $examples = [
            '415.902.2146',
            '(415) 902 2146',
            '415 902 2146',
            '414-902-2146',
            '(415) 902-2146',
            '4159022146',
        ];
        foreach ($examples as $data) {
            $this->assertTrue($this->validator->test($data), "Expected valid: $data");
        }
    }

    public function testWeirdFormatPasses(): void
    {
        $this->assertTrue($this->validator->test('415..902..2146'));
    }
}
