<?php

/**
 * ElementFormBuilderTest.php
 *
 * @version $Id: $
 * @package BunyipFormBuilder
 * @copyright 2011-2019
 */

namespace BunyipFormBuilder;
include '../../FormBuilder.php';
include '../../ElementFormBuilder.php';

use PHPUnit\Framework\TestCase;

class ElementFormBuilderTest extends TestCase
{

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp(): void
    {
        $this->data = array(
            'label' => 'Label',
            'id' => 'id',
            'name' => 'name',
            'value' => 'value',
            'class' => 'class',
            'required' => 'required',
            'error' => 'error'
        );

    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown(): void
    {
        parent::tearDown();
    }

    public function testConstruct()
    {
        $elem = new \FormBuilder\ElementFormBuilder($this->data);
        $this->assertEquals($elem->getLabel(), $this->data['label']);
        $this->assertEquals($elem->getId(), $this->data['id']);
    }

    public function testConstructFail()
    {
        $array = array();
        $elem = new \FormBuilder\ElementFormBuilder($array);
        $this->assertNotEquals($elem->getLabel(), 'label');
        $this->assertNotEquals($elem->getId(), 'id');
    }

    public function testSetClass()
    {
        unset($this->data['error']);
        $elem = new \FormBuilder\ElementFormBuilder($this->data);
        $elem->setClass('foo');
        $this->assertEquals('class="foo"', $elem->getCssClass());
    }

    public function testSetRequired()
    {
        $elem = new \FormBuilder\ElementFormBuilder(($this->data));
        $this->assertEquals(false, $elem->getRequired());
        $elem->setRequired(true);
        $this->assertEquals('required="required"', $elem->getRequired());
    }

    public function testSetRequiredFalses()
    {
        $elem = new \FormBuilder\ElementFormBuilder(($this->data));
        $this->assertEquals(false, $elem->getRequired());
        $elem->setRequired('true');
        $this->assertEquals(false, $elem->getRequired());
    }

    public function testGetId()
    {
        $elem = new \FormBuilder\ElementFormBuilder($this->data);
        $this->assertEquals('id', $elem->getId());
    }

    public function testGetIdNoId()
    {
        unset($this->data['id']);
        $elem = new \FormBuilder\ElementFormBuilder($this->data);
        $this->assertEquals('name', $elem->getId());
    }
}
