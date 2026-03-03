<?php

/**
 * ValidatorTest.php
 *
 * @package BunyipFormBuilder
 *
 * Note: tests for ValidationStrategyEventThumbnail (a VirtualInvite-specific
 * strategy) and ViDateTime (VirtualInvite-specific helper) have been removed;
 * they belong in the VirtualInvite test suite.
 *
 * Date strings must use Y-m-d format as required by isValidDate().
 */

namespace BunyipFormBuilder;

use PHPUnit\Framework\TestCase;
use BunyipFormBuilder\strategies\ValidationStrategyLength;
use BunyipFormBuilder\strategies\ValidationStrategyNumbers;
use BunyipFormBuilder\strategies\ValidationStrategyUpperCase;
use BunyipFormBuilder\strategies\ValidationStrategyPhoneUsa;
use BunyipFormBuilder\strategies\ValidationStrategyPhoneUk;

class ValidatorTest extends TestCase
{
    private Validator $validator;

    protected function setUp(): void
    {
        $this->validator = new Validator();
    }

    protected function tearDown(): void
    {
    }

    // -------------------------------------------------------------------------
    // isValidEmail
    // -------------------------------------------------------------------------

    public function testIsValidEmail(): void
    {
        $this->assertTrue($this->validator->isValidEmail('test@ourgourmetlife.com'));
    }

    public function testIsValidEmailFalse(): void
    {
        $this->assertFalse($this->validator->isValidEmail('testourgourmetlife.com'));
    }

    public function testIsValidEmailNullValue(): void
    {
        $this->assertFalse($this->validator->isValidEmail(null));
    }

    // -------------------------------------------------------------------------
    // isValidPhone
    // -------------------------------------------------------------------------

    public function testIsValidPhone(): void
    {
        $this->assertTrue($this->validator->isValidPhone('800 555 1212'));
    }

    public function testIsValidPhoneBrackets(): void
    {
        $this->assertTrue($this->validator->isValidPhone('(800) 555 1212'));
    }

    public function testIsValidPhoneCrammed(): void
    {
        $this->assertTrue($this->validator->isValidPhone('8005551212'));
    }

    public function testIsValidPhoneHyphen(): void
    {
        $this->assertTrue($this->validator->isValidPhone('800-555-1212'));
    }

    public function testIsValidPhoneFalse(): void
    {
        $this->assertEmpty($this->validator->fails);
        $this->assertFalse($this->validator->isValidPhone('800'));
        $this->assertStringStartsWith('Needs', $this->validator->fails['phone'][0]);
    }

    public function testIsValidPhoneNull(): void
    {
        $this->assertEmpty($this->validator->fails);
        $this->assertFalse($this->validator->isValidPhone(null));
        $this->assertStringStartsWith('Needs', $this->validator->fails['phone'][0]);
    }

    // -------------------------------------------------------------------------
    // isValidNumber
    // -------------------------------------------------------------------------

    public function testIsValidNumberInt(): void
    {
        $this->assertTrue($this->validator->isValidNumber(1234));
    }

    public function testIsValidNumberStringInt(): void
    {
        $this->assertTrue($this->validator->isValidNumber('1234'));
    }

    public function testIsValidNumberLetters(): void
    {
        $this->assertFalse($this->validator->isValidNumber('asdb'));
    }

    public function testIsValidNumberNull(): void
    {
        $this->assertFalse($this->validator->isValidNumber(null));
    }

    public function testIsValidNumberFalse(): void
    {
        $this->assertFalse($this->validator->isValidNumber(false));
    }

    // -------------------------------------------------------------------------
    // isValidDate  (Y-m-d format required)
    // -------------------------------------------------------------------------

    public function testIsValidDate(): void
    {
        $this->assertTrue($this->validator->isValidDate('2000-01-01'));
    }

    public function testIsValidDateInvalidDate(): void
    {
        $this->assertFalse($this->validator->isValidDate('not-a-date'));
    }

    public function testIsValidDateFuture(): void
    {
        $this->assertTrue($this->validator->isValidDate('2100-01-01', true));
    }

    public function testIsValidDateDateNotFuture(): void
    {
        $this->assertFalse($this->validator->isValidDate('2000-01-01', true));
    }

    public function testIsValidDateInvalidDateFuture(): void
    {
        $this->assertFalse($this->validator->isValidDate('not-a-date', true));
    }

    // -------------------------------------------------------------------------
    // validateZipcode
    // -------------------------------------------------------------------------

    public function testValidateZipcode(): void
    {
        $this->assertTrue($this->validator->validateZipcode('00213'));
    }

    public function testValidateZipcodeWithCountrycode(): void
    {
        $this->assertTrue($this->validator->validateZipcode('00213', 'US'));
    }

    public function testValidateZipcodeWithNonUSCountrycode(): void
    {
        $this->assertTrue($this->validator->validateZipcode('anything', 'CA'));
    }

    public function testValidateZipcodeBadCode(): void
    {
        $this->assertFalse($this->validator->validateZipcode('00zz3'));
    }

    // -------------------------------------------------------------------------
    // isValidName
    // -------------------------------------------------------------------------

    public function testIsValidName(): void
    {
        $this->assertTrue($this->validator->isValidName('Eugenia'));
    }

    public function testIsValidNameNull(): void
    {
        $this->assertFalse($this->validator->isValidName(null));
    }

    public function testIsValidNameTooShort(): void
    {
        $this->assertFalse($this->validator->isValidName(''));
    }

    public function testIsValidNameTooLong(): void
    {
        $this->assertFalse($this->validator->isValidName(str_repeat('E', 130)));
    }

    public function testIsValidNameMixedAlphanumeric(): void
    {
        $this->assertTrue($this->validator->isValidName('abc123'));
    }

    public function testIsValidNameBadCharacters(): void
    {
        $this->assertFalse($this->validator->isValidName('abc123!@#'));
    }

    public function testIsValidNameWithMiddleInitial(): void
    {
        $this->assertTrue($this->validator->isValidName('Jeyna M Fey'));
    }

    public function testIsValidNameWithSuffix(): void
    {
        $this->assertTrue($this->validator->isValidName('Jeyna Fey Jr'));
    }

    public function testIsValidNameWithPeriodInitial(): void
    {
        $this->assertTrue($this->validator->isValidName('Jeyna M. Fey'));
    }

    public function testIsValidNameWithPeriodSuffix(): void
    {
        $this->assertTrue($this->validator->isValidName('Jeyna Fey Jr.'));
    }

    // -------------------------------------------------------------------------
    // isValidImagePath
    // -------------------------------------------------------------------------

    public function testIsValidImagePath(): void
    {
        $this->assertTrue($this->validator->isValidImagePath('upload/events/loretta.png'));
    }

    public function testIsValidImagePathInvalidExtension(): void
    {
        $this->assertFalse($this->validator->isValidImagePath('upload/events/loretta.llama'));
    }

    // -------------------------------------------------------------------------
    // isStrongPassword
    // -------------------------------------------------------------------------

    public function testIsStrongPassword(): void
    {
        $this->assertTrue($this->validator->isStrongPassword('755W^t2dBtZJR!X5'));
    }

    public function testIsStrongPasswordWithLengthStrategy(): void
    {
        $this->validator->attach(new ValidationStrategyLength(6), 'password');
        $this->assertTrue($this->validator->isStrongPassword('1234567'));
    }

    public function testIsStrongPasswordFailWithLengthStrategy(): void
    {
        $this->validator->attach(new ValidationStrategyLength(6), 'password');
        $this->assertFalse($this->validator->isStrongPassword('12345'));
    }

    public function testIsStrongPasswordWithNumbersStrategy(): void
    {
        $this->validator->attach(new ValidationStrategyNumbers(6), 'password');
        $this->assertTrue($this->validator->isStrongPassword('1234567'));
    }

    public function testIsStrongPasswordFailWithNumbersStrategy(): void
    {
        $this->validator->attach(new ValidationStrategyNumbers(6), 'password');
        $this->assertFalse($this->validator->isStrongPassword('12345'));
    }

    public function testIsStrongPasswordWithMultipleStrategies(): void
    {
        $this->validator->attach(new ValidationStrategyLength(6), 'password');
        $this->validator->attach(new ValidationStrategyUpperCase(3), 'password');
        $this->assertTrue($this->validator->isStrongPassword('123ABC67'));
    }

    // -------------------------------------------------------------------------
    // attach
    // -------------------------------------------------------------------------

    public function testAttach(): void
    {
        $this->assertNull($this->validator->strategies);
        $strategy = new ValidationStrategyPhoneUsa();
        $this->validator->attach($strategy, 'Test');
        $this->assertArrayHasKey('Test', $this->validator->strategies);
    }

    public function testAttachMultiple(): void
    {
        $strategy = new ValidationStrategyPhoneUsa();
        $this->validator->attach($strategy, 'Test');
        $this->assertCount(1, $this->validator->strategies['Test']);
        $this->validator->attach(new ValidationStrategyPhoneUk(), 'Test');
        $this->assertCount(2, $this->validator->strategies['Test']);
    }

    public function testAttachDifferentContexts(): void
    {
        $this->validator->attach(new ValidationStrategyPhoneUsa(), 'foo');
        $this->assertCount(1, $this->validator->strategies['foo']);
        $this->validator->attach(new ValidationStrategyPhoneUk(), 'bar');
        $this->assertCount(1, $this->validator->strategies['bar']);
    }

    // -------------------------------------------------------------------------
    // getFails
    // -------------------------------------------------------------------------

    public function testGetFailsInitiallyEmpty(): void
    {
        $this->assertEmpty($this->validator->getFails());
    }

    public function testGetFailsWithFail(): void
    {
        $this->validator->isValidEmail('testourgourmetlife.com');
        $this->assertCount(1, $this->validator->getFails('email'));
    }

    public function testGetFailsWithFailWithoutKey(): void
    {
        $this->validator->isValidEmail('testourgourmetlife.com');
        $this->assertArrayHasKey('email', $this->validator->getFails());
    }
}
