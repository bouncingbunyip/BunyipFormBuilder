<?php

/**
 * Created by PhpStorm.
 * User: jackal
 * Date: 4/11/16
 * Time: 6:43 PM
 */
class ValidationResultsTest extends PHPUnit_Framework_TestCase
{

    protected function setUp()
    {
    }

    protected function tearDown()
    {
    }

    public function testSetPost()
    {
        $vr = new ValidationResults();
        $this->assertFalse($vr->fields);
        $this->assertEmpty($vr->post);
    }

    public function testSetPostWithPost()
    {
        $post = array('foo' => 'bar');
        $vr = new ValidationResults($post);
        $this->assertFalse($vr->fields);
        $this->assertEquals($vr->getPost(), $post);
    }

    public function testFail()
    {
        $post = array('foo' => 'bar');
        $vr = new ValidationResults($post);
        $this->assertFalse($vr->fields);
        $expect = array('foo' => array('foo failed'));
        $vr->fail('foo', 'foo failed');
        $this->assertEquals($vr->getFails(), $expect);
    }

    public function testFailInvalidField()
    {
        $post = array('foo' => 'bar');
        $vr = new ValidationResults($post);
        $this->assertFalse($vr->fields);
        $vr->fail('foo', 'foo failed');
        $this->assertFalse($vr->getFail('bar'));
    }

    public function testIsValid()
    {
        $post = array('foo' => 'bar');
        $vr = new ValidationResults($post);
        $this->assertFalse($vr->fields);
        $this->assertTrue($vr->isValid());
    }

    public function testIsValidNotValid()
    {
        $post = array('foo' => 'bar');
        $vr = new ValidationResults($post);
        $this->assertFalse($vr->fields);
        $expect = array('foo' => array('foo failed'));
        $vr->fail('foo', 'foo failed');
        $this->assertFalse($vr->isValid());
    }

    public function testGetPostWithoutPost()
    {
        $vr = new ValidationResults();
        $this->assertFalse($vr->fields);
        $this->assertEquals($vr->getPost(), array());
    }

    public function testGetPostWithPost()
    {
        $post = array('foo' => 'bar');
        $vr = new ValidationResults($post);
        $this->assertFalse($vr->fields);
        $this->assertEquals($vr->getPost(), $post);
    }

}
