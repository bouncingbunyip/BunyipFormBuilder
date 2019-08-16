<?php
/**
 * FormBuilderTest.php
 *
 * @version $Id: $
 * @package FormBuilder
 * @copyright 2011-2016
 */

namespace FormBuilder;
include '../../FormBuilder.php';
include '../../FieldsetFormBuilder.php';

use PHPUnit\Framework\TestCase;

class FormBuilderTest extends TestCase
{

    /**
     *
     * @var FormBuilder
     */
    private $object;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        $this->object = new \FormBuilder\FormBuilder();
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        $this->object = null;
    }


    public function test__construct()
    {
        $object = new \FormBuilder\FormBuilder();
        $action = $object->getAction();
        $this->assertEquals('index.php', $action);
    }

    public function testConstructWithValidAttributes() {
        $attributes = array('action' => 'foo', 'method' => 'get');
        $object = new \FormBuilder\FormBuilder($attributes);
        $expect = 'foo';
        $actual = $object->getAction();
        $this->assertEquals($expect, $actual);
        $expect = 'get';
        $actual = $object->getMethod();
        $this->assertEquals($expect, $actual);
    }

    public function testConstructWithInvalidAttributes() {
        $attributes = array('notaction' => 'foo', 'notmethod' => 'get');
        $object = new \FormBuilder\FormBuilder($attributes);
        $expect = 'index.php';
        $actual = $object->getAction();
        $this->assertEquals($expect, $actual);
        $expect = 'post';
        $actual = $object->getMethod();
        $this->assertEquals($expect, $actual);
    }

    public function testSetTheme()
    {
        $expect = 'default';
        $actual = $this->object->getTheme();
        $this->assertEquals($expect, $actual);
        $this->object->setTheme('newtheme');
        $expect = 'newtheme';
        $actual = $this->object->getTheme();
        $this->assertEquals($expect, $actual);
        //$this->markTestIncomplete("setAutofocus test not implemented");
    }

    public function testGetTheme()
    {
        $expect = 'default';
        $actual = $this->object->getTheme();
        $this->assertEquals($expect, $actual);
    }

    public function testSetStrict()
    {
        $expect = false;
        $this->object->setStrict(false);
        $actual = $this->object->getStrict();
        $this->assertEquals($expect, $actual);
    }

    public function testGetStrict()
    {
        $expect = true;
        $actual = $this->object->getStrict();
        $this->assertEquals($expect, $actual);
    }

    public function testSetMethod()
    {
        $expect = 'post';
        $this->object->setMethod();
        $actual = $this->object->getMethod();
        $this->assertEquals($expect, $actual);
    }

    public function testSetMethodPost()
    {
        $expect = 'post';
        $this->object->setMethod('post');
        $actual = $this->object->getMethod();
        $this->assertEquals($expect, $actual);
    }

    public function testSetMethodGet()
    {
        $expect = 'get';
        $this->object->setMethod('get');
        $actual = $this->object->getMethod();
        $this->assertEquals($expect, $actual);
    }

    public function testSetMethodStrictOff()
    {
        $this->object->setStrict(false);
        $expect = 'foo';
        $this->object->setMethod('foo');
        $actual = $this->object->getMethod();
        $this->assertEquals($expect, $actual);
    }

    public function testSetMethodStrictOn()
    {
        $this->object->setStrict(true);
        $expect = 'post';
        $this->object->setMethod('foo');
        $actual = $this->object->getMethod();
        $this->assertEquals($expect, $actual);
    }

    public function testGetMethod()
    {
        $expect = 'post';
        $actual = $this->object->getMethod();
        $this->assertEquals($expect, $actual);
    }

    public function testSetAction()
    {
        $expect = 'index.php';
        $this->object->setAction('index.php');
        $actual = $this->object->getAction();
        $this->assertEquals($expect, $actual);
    }

    public function testGetAction()
    {
        $expect = 'index.php';
        $actual = $this->object->getAction();
        $this->assertEquals($expect, $actual);
    }

    public function testSetClass()
    {
        $expect = 'newclass';
        $this->object->setClass('newclass');
        $actual = $this->object->getClass();
        $this->assertEquals($expect, $actual);
    }

    public function testGetClass()
    {
        $expect = 'vi-form';
        $actual = $this->object->getClass();
        $this->assertEquals($expect, $actual);
    }

    public function testSetAutofocus()
    {
        $expect = '';
        $actual = $this->object->getAutofocus();
        $this->assertEquals($expect, $actual);
        $this->object->setAutofocus('foo');
        $expect = 'foo';
        $actual = $this->object->getAutofocus();
        $this->assertEquals($expect, $actual);
    }

    public function testSetFieldset()
    {
        $fieldset = array(1,2,3);
        $actual = $this->object->getFieldsets();
        $this->assertNull($actual);
        $this->object->setFieldset($fieldset);
        $actual = $this->object->getFieldsets();
        $this->assertEquals(array($fieldset), $actual);
    }

    public function testAddFieldset()
    {
        $title = 'title';
        $id = 1;
        $name = 'name';
        $class = 'cssclass';
        $fieldset = $this->object->addFieldset($title, $id, $name, $class);
        $this->assertInstanceOf('\FormBuilder\FieldsetFormBuilder', $fieldset);
    }

    public function testSetUid()
    {
        $expect = 'abc123';
        $this->object->setUid($expect);
        $actual = $this->object->getUid();
        $this->assertEquals($expect, $actual);
    }

    public function testGetUid()
    {
        $uid = $this->object->getUid();
        $count = strlen($uid);
        $this->assertEquals($count, 16);
    }

    public function testGetUidWithHelper()
    {
        $this->markTestIncomplete("getUid with Helper test not implemented");
    }

    public function testGetCsrf()
    {
        $uid = \FormBuilder\FormBuilder::getCsrf();
        $count = strlen($uid);
        $this->assertEquals($count, 16);
    }

    public function testAddElem()
    {
        $this->markTestIncomplete("setAutofocus test not implemented");
    }

    public function testRegisterExternal()
    {
        $this->object->registerExternal('foo.css', 'css');
        $expect = array('foo.css');
        $actual = $this->object->getExternalCss();
        $this->assertEquals($expect, $actual);
        $this->object->registerExternal('foo.js', 'js');
        $expect = array('foo.js');
        $actual = $this->object->getExternalJs();
        $this->assertEquals($expect, $actual);
    }

    public function testGetExternalCss()
    {
        $expect = array();
        $actual = $this->object->getExternalCss();
        $this->assertEquals($expect, $actual);
    }

    public function testGetExternalJs()
    {
        $expect = array();
        $actual = $this->object->getExternalJs();
        $this->assertEquals($expect, $actual);
    }

    public function testSetFormAttributes()
    {
        $this->markTestIncomplete("setFormAttributes test not implemented");
    }

    public function testGetFormAttributes()
    {
        $this->markTestIncomplete("getFormAttributes test not implemented");
    }

    public function testRender()
    {
        $this->markTestIncomplete("render test not implemented");
    }

    public function testRenderFieldset()
    {
        $this->markTestIncomplete("renderFieldset test not implemented");
    }

    public function testSetDependency()
    {
        $this->object->setDependency('foo', 'bar');
        $expect = 'bar';
        $actual = $this->object->getDependency('foo');
        $this->assertEquals($expect, $actual);
    }

    public function testGetDependency()
    {
        $this->markTestIncomplete("getDependency test not implemented");
    }
}
