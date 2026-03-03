<?php

/**
 * ValidationResultsTest.php
 *
 * @package BunyipFormBuilder
 */

namespace BunyipFormBuilder;

use PHPUnit\Framework\TestCase;

class ValidationResultsTest extends TestCase
{
    protected function setUp(): void
    {
    }

    protected function tearDown(): void
    {
    }

    public function testInitialFieldsAreEmpty(): void
    {
        $vr = new ValidationResults();
        $this->assertEmpty($vr->fields);
        $this->assertEmpty($vr->post);
    }

    public function testSetPostWithPost(): void
    {
        $post = array('foo' => 'bar');
        $vr = new ValidationResults($post);
        $this->assertEmpty($vr->fields);
        $this->assertEquals($post, $vr->getPost());
    }

    public function testFail(): void
    {
        $post = array('foo' => 'bar');
        $vr = new ValidationResults($post);
        $expect = array('foo' => array('foo failed'));
        $vr->fail('foo', 'foo failed');
        $this->assertEquals($expect, $vr->getFails());
    }

    public function testGetFailInvalidField(): void
    {
        $post = array('foo' => 'bar');
        $vr = new ValidationResults($post);
        $vr->fail('foo', 'foo failed');
        $this->assertFalse($vr->getFail('bar'));
    }

    public function testIsValidWhenNoFails(): void
    {
        $post = array('foo' => 'bar');
        $vr = new ValidationResults($post);
        $this->assertTrue($vr->isValid());
    }

    public function testIsValidWhenFailed(): void
    {
        $post = array('foo' => 'bar');
        $vr = new ValidationResults($post);
        $vr->fail('foo', 'foo failed');
        $this->assertFalse($vr->isValid());
    }

    public function testGetPostWithoutPost(): void
    {
        $vr = new ValidationResults();
        $this->assertEquals(array(), $vr->getPost());
    }

    public function testGetPostWithPost(): void
    {
        $post = array('foo' => 'bar');
        $vr = new ValidationResults($post);
        $this->assertEquals($post, $vr->getPost());
    }
}
