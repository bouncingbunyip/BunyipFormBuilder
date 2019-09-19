<?php
require_once PATH_TO_LIB . 'Validator.php';
require_once PATH_TO_LIB . 'ValidationStrategyInterface.php';
require_once PATH_TO_LIB . 'ValidationStrategyPhoneUsa.php';
require_once PATH_TO_LIB . 'ValidationStrategyPhoneUk.php';
require_once PATH_TO_LIB . 'ValidationStrategyLength.php';
require_once PATH_TO_LIB . 'ValidationStrategyNumbers.php';
require_once PATH_TO_LIB . 'ValidationStrategyPunctuation.php';
require_once PATH_TO_LIB . 'ValidationStrategyUpperCase.php';
require_once PATH_TO_LIB . 'ValidationStrategyEventThumbnail.php';
require_once PATH_TO_LIB . 'ValidationStrategyFileExists.php';

require_once PATH_TO_LIB . 'ViDateTime.php';
require_once PATH_TO_FIXTURES . 'StubbedModel.php';


/**
 * Validator test case.
 */
class ValidatorTest extends PHPUnit_Framework_TestCase
{

    /**
     *
     * @var Validator
     */
    private $validator;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();
        $this->validator = new Validator(/* parameters */);
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        $this->validator = null;
        parent::tearDown();
    }

    /**
     * Constructs the test case.
     */
    public function __construct()
    {
    }

    /**
     * Tests Validator->isValidEmail()
     */
    public function testIsValidEmail()
    {
        $email = 'test@ourgourmetlife.com';
        $result = $this->validator->isValidEmail($email);
        $this->assertTrue($result);
    }

    public function testIsValidEmailFalse()
    {
        $email = 'testourgourmetlife.com';
        $result = $this->validator->isValidEmail($email);
        $this->assertFalse($result);
    }

    public function testIsValidEmailNullValue()
    {
        $email = NULL;
        $result = $this->validator->isValidEmail($email);
        $this->assertFalse($result);
    }


    /**
     * Tests Validator->isValidPhone()
     */
    public function testIsValidPhone()
    {
        $phone = '800 555 1212';
        $result = $this->validator->isValidPhone($phone);
        $this->assertTrue($result);
    }

    public function testIsValidPhoneBrackets()
    {
        $phone = '(800) 555 1212';
        $result = $this->validator->isValidPhone($phone);
        $this->assertTrue($result);
    }

    public function testIsValidPhoneCrammed()
    {
        $phone = '8005551212';
        $result = $this->validator->isValidPhone($phone);
        $this->assertTrue($result);
    }

    public function testIsValidPhoneHyphen()
    {
        $phone = '800-555-1212';
        $result = $this->validator->isValidPhone($phone);
        $this->assertTrue($result);
    }

    public function testIsValidPhoneFalse()
    {
        $this->assertFalse($this->validator->fails);
        $phone = '800';
        $result = $this->validator->isValidPhone($phone);
        $this->assertFalse($result);
        $this->assertStringStartsWith('Needs', $this->validator->fails['phone'][0]);
    }

    public function testIsValidPhoneNull()
    {
        $this->assertFalse($this->validator->fails);
        $phone = NULL;
        $result = $this->validator->isValidPhone($phone);
        $this->assertFalse($result);
        $this->assertStringStartsWith('Needs', $this->validator->fails['phone'][0]);
    }

    /**
     * Tests Validator->isValidNumber()
     */
    public function testIsValidNumber()
    {
        $number = 1234;
        $result = $this->validator->isValidNumber($number);
        $this->assertTrue($result);
    }

    public function testIsValidNumberInvalid()
    {
        $number = "1234";
        $result = $this->validator->isValidNumber($number);
        $this->assertTrue($result);
    }

    public function testIsValidNumberLetters()
    {
        $number = "asdb";
        $result = $this->validator->isValidNumber($number);
        $this->assertFalse($result);
    }

    public function testIsValidNumberNull()
    {
        $number = NULL;
        $result = $this->validator->isValidNumber($number);
        $this->assertFalse($result);
    }

    public function testIsValidNumberFalse()
    {
        $number = FALSE;
        $result = $this->validator->isValidNumber($number);
        $this->assertFalse($result);
    }

    /**
     * Tests Validator->isValidDate()
     */
    public function testIsValidDate()
    {
        $date = '01/01/2000';
        $result = $this->validator->isValidDate($date);
        $this->assertTrue($result);
    }

    public function testIsValidDateInvalidDate()
    {
        $date = '51/51/2000';
        $result = $this->validator->isValidDate($date);
        $this->assertFalse($result);
    }

    public function testIsValidDateFuture()
    {
        $date = '01/01/2100';
        $result = $this->validator->isValidDate($date, true);
        $this->assertTrue($result);
    }

    public function testIsValidDateDateNotFuture()
    {
        $date = '01/01/2000';
        $result = $this->validator->isValidDate($date, true);
        $this->assertFalse($result);
    }

    public function testIsValidDateInvalidDateFuture()
    {
        $date = '51/51/2000';
        $result = $this->validator->isValidDate($date, true);
        $this->assertFalse($result);
    }

    /**
     * Tests Validator->validateTableId()
     */
//    public function testValidateTableId()
//    {
//        $model = new StubbedModel;
//        $method = 'getId';
//        $id = 1;
//        $result = $this->validator->validateTableId($model, $method, $id);
//        $this->assertTrue($result);
//    }
//
//    public function testValidateTableIdFalse()
//    {
//        $model = new StubbedModel;
//        $method = 'getId';
//        $id = 2;
//        $result = $this->validator->validateTableId($model, $method, $id);
//        $this->assertFalse($result);
//    }
//
//    public function testValidateTableIdInvalidMethod()
//    {
//        $model = new StubbedModel;
//        $method = 'NotAMethod';
//        $id = 1;
//        $result = $this->validator->validateTableId($model, $method, $id);
//        $this->assertFalse($result);
//    }

    /**
     * Tests Validator->validateStateId()
     */
    public function testValidateStateId()
    {
        // TODO Auto-generated ValidatorTest->testValidateStateId()
        $this->markTestIncomplete("validateStateId test not implemented");

        $this->validator->validateStateId(/* parameters */);
    }

    /**
     * Tests Validator->validateZipcode()
     * @covers Validator::validateZipcode
     */
    public function testValidateZipcode()
    {
        $zip = '00213';
        $result = $this->validator->validateZipcode($zip);
        $this->assertTrue($result);
    }

    public function testValidateZipcodeWithCountycode()
    {
        $zip = '00213';
        $result = $this->validator->validateZipcode($zip, 'US');
        $this->assertTrue($result);
    }

    public function testValidateZipcodeWithNonUSCountycode()
    {
        $zip = 'anything';
        $result = $this->validator->validateZipcode($zip, 'CA');
        $this->assertTrue($result);
    }

    public function testValidateZipcodeBadCode()
    {
        $zip = '00zz3';
        $result = $this->validator->validateZipcode($zip);
        $this->assertFalse($result);
    }

    /**
     * Tests Validator->isValidName()
     */
    public function testIsValidName()
    {
        $name = 'Eugenia';
        $result = $this->validator->isValidName($name);
        $this->assertTrue($result);
    }

    public function testIsValidNameNull()
    {
        $name = NULL;
        $result = $this->validator->isValidName($name);
        $this->assertFalse($result);
    }

    public function testIsValidTooShort()
    {
        $name = '';
        $result = $this->validator->isValidName($name);
        $this->assertFalse($result);
    }

    public function testIsValidTooLong()
    {
        $name = 'EeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeEeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee';
        $result = $this->validator->isValidName($name);
        $this->assertFalse($result);
    }

    public function testIsValidMixedCharacters()
    {
        $name = 'abc123';
        $result = $this->validator->isValidName($name);
        $this->assertTrue($result);
    }

    public function testIsValidBadMixedCharacters()
    {
        $name = 'abc123!@#';
        $result = $this->validator->isValidName($name);
        $this->assertFalse($result);
    }

    public function testIsValidAbbrevInitial()
    {
        $name = 'Jeyna M Fey';
        $result = $this->validator->isValidName($name);
        $this->assertTrue($result);
    }

    public function testIsValidAbbrevSuffix()
    {
        $name = 'Jeyna Fey Jr';
        $result = $this->validator->isValidName($name);
        $this->assertTrue($result);
    }

    public function testIsValidAbbrevInitialWithPeriod()
    {
        $name = 'Jeyna M. Fey';
        $result = $this->validator->isValidName($name);
        $this->assertTrue($result);
    }

    public function testIsValidAbbrevSuffixWithPeriod()
    {
        $name = 'Jeyna Fey Jr.';
        $result = $this->validator->isValidName($name);
        $this->assertTrue($result);
    }

    /**
     * Tests Validator->isValidImagePath()
     */
    public function testIsValidImagePath()
    {
        $path = 'upload/events/loretta.png';
        $result = $this->validator->isValidImagePath($path);
        $this->assertTrue($result);
    }

    public function testIsValidImagePathInvalidExtension()
    {
        $path = 'upload/events/loretta.llama';
        $result = $this->validator->isValidImagePath($path);
        $this->assertFalse($result);
    }

    public function testIsValidImagePathWithStrategy()
    {
        $path = 'upload/events/loretta.png';
        $this->validator->attach(new ValidationStrategyEventThumbnail('upload/events/'), 'imagepath');
        $result = $this->validator->isValidImagePath($path);
        $this->assertTrue($result);
    }

    public function testIsValidImagePathWithStrategyFails()
    {
        $path = 'upload/women/loretta.png';
        $this->validator->attach(new ValidationStrategyEventThumbnail('upload/events/'), 'imagepath');
        $result = $this->validator->isValidImagePath($path);
        $this->assertFalse($result);
    }

    /**
     * Tests Validator->isStrongPassword()
     */
    public function testIsStrongPassword()
    {
        $password = '755W^t2dBtZJR!X5';
        $result = $this->validator->isStrongPassword($password);
        $this->assertTrue($result);
    }

    public function testIsStrongPasswordWithLengthStrategy()
    {
        $this->validator->attach(new ValidationStrategyLength(6), 'password');
        $password = '1234567';
        $result = $this->validator->isStrongPassword($password);
        $this->assertTrue($result);
    }

    public function testIsStrongPasswordFailWithLengthStrategy()
    {
        $this->validator->attach(new ValidationStrategyLength(6), 'password');
        $password = '12345';
        $result = $this->validator->isStrongPassword($password);
        $this->assertFalse($result);
    }

    public function testIsStrongPasswordWithNumbersStrategy()
    {
        $this->validator->attach(new ValidationStrategyNumbers(6), 'password');
        $password = '1234567';
        $result = $this->validator->isStrongPassword($password);
        $this->assertTrue($result);
    }

    public function testIsStrongPasswordFailWithNumbersStrategy()
    {
        $this->validator->attach(new ValidationStrategyNumbers(6), 'password');
        $password = '12345';
        $result = $this->validator->isStrongPassword($password);
        $this->assertFalse($result);
    }

    public function testIsStrongPasswordWithMultipleStrategies()
    {
        $this->validator->attach(new ValidationStrategyLength(6), 'password');
        $this->validator->attach(new ValidationStrategyUpperCase(3), 'password');
        $password = '123ABC67';
        $result = $this->validator->isStrongPassword($password);
        $this->assertTrue($result);
    }

    /**
     * Tests Validator->attach()
     */
    public function testAttach()
    {
        $this->assertNull($this->validator->strategies);
        $strategy = new ValidationStrategyPhoneUsa();
        $this->validator->attach($strategy, 'Test');
        $this->assertArrayHasKey('Test', $this->validator->strategies);
    }

    public function testAttachMultiple()
    {
        $this->assertNull($this->validator->strategies);
        $strategy = new ValidationStrategyPhoneUsa();
        $this->validator->attach($strategy, 'Test');
        $this->assertArrayHasKey('Test', $this->validator->strategies);
        $this->assertCount(1, $this->validator->strategies['Test']);
        $strategy = new ValidationStrategyPhoneUk();
        $this->validator->attach($strategy, 'Test');
        $this->assertCount(2, $this->validator->strategies['Test']);
    }

    public function testAttachDifferentContexts()
    {
        $this->assertNull($this->validator->strategies);
        $strategy = new ValidationStrategyPhoneUsa();
        $this->validator->attach($strategy, 'foo');
        $this->assertArrayHasKey('foo', $this->validator->strategies);
        $this->assertCount(1, $this->validator->strategies['foo']);
        $strategy = new ValidationStrategyPhoneUk();
        $this->validator->attach($strategy, 'bar');
        $this->assertArrayHasKey('bar', $this->validator->strategies);
        $this->assertCount(1, $this->validator->strategies['bar']);
    }

    /**
     * Tests Validator->getFails()
     */
    public function testGetFails()
    {
        $result = $this->validator->getFails();
        $this->assertFalse($result);
    }

    public function testGetFailsWithFail()
    {
        $email = 'testourgourmetlife.com';
        $this->validator->isValidEmail($email);
        $result = $this->validator->getFails('email');
        $this->assertCount(1, $result);
    }

    public function testGetFailsWithFailWithoutKey()
    {
        $email = 'testourgourmetlife.com';
        $this->validator->isValidEmail($email);
        $result = $this->validator->getFails();
        $this->assertArrayHasKey('email', $result);
    }
}