<?php
/**
 * ButtonFormBuilderTest.php
 *
 * @version $Id: $
 * @package FormBuilder
 * @copyright 2011-2016
 */

namespace FormBuilder;

include '../../../ElementFormBuilder.php';
include '../../../elements/ButtonFormBuilder.php';
include '../../../templates/ButtonDefaultTemplate.php';

use PHPUnit\Framework\TestCase;

class ButtonFormBuilderTest extends TestCase
{

    public function testBasicButton() {
        $attr = array(
            'value'=>'Name',
            'id'=>'name-id',
            'name'=>'name'
        );
        $form = new ButtonFormBuilder($attr);
        $expect = '<input type="button" id="name-id" name="name" value="Name">';
        $actual = $form->render();
        $this->assertEquals(trim($expect), trim($actual));
    }

    public function testWithOnClick() {
        $attr = array(
            'id'=>'name-id',
            'name'=>'name',
            'value'=>'Big Bob',
            'class'=>'name',
            'onclick'=>'alert(\'Hello World!\')'
        );
        $form = new ButtonFormBuilder($attr);
        $expect = '<input type="button" id="name-id" name="name" value="Big Bob" class="name" onclick="alert(\'Hello World!\')">';
        $actual = $form->render();
        $this->assertEquals(trim($expect), trim($actual));
    }

    public function testGetOnClick()
    {
        $attr = array(
            'id'=>'name-id',
            'name'=>'name',
            'value'=>'Big Bob',
            'class'=>'name',
            'onclick'=>'foo'
        );
        $form = new ButtonFormBuilder($attr);
        $onclick = $form->getOnClick();
        $this->assertEquals($onclick, 'foo');
    }

    public function testGetOnClickNotSet()
    {
        $attr = array(
            'id'=>'name-id',
            'name'=>'name',
            'value'=>'Big Bob',
            'class'=>'name',
        );
        $form = new ButtonFormBuilder($attr);
        $onclick = $form->getOnClick();
        $this->assertFalse($onclick);
    }

}
