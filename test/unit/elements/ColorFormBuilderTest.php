<?php
/**
 * ColorFormBuilderTest.php
 *
 * @version $Id: $
 * @package BunyipFormBuilder
 * @copyright 2011 - 2020
 */

namespace BunyipFormBuilder;
include '../../../ElementFormBuilder.php';
include '../../../elements/ColorFormBuilder.php';
use PHPUnit\Framework\TestCase;

class ColorFormBuilderTest extends TestCase
{

    public function testGetAttributesEmptyAttrs()
    {
        $attr = array(
            'label'=>'Color',
            'id'=>'name-id',
            'name'=>'name',
            'value'=>'#ff00ff',
        );
        $form = new ColorFormBuilder($attr);
        $attrs = $form->getAttributes();
        $this->assertEmpty($attrs);
    }

    public function testGetAttributesWithRequired()
    {
        $attr = array(
            'label'=>'Color',
            'id'=>'name-id',
            'name'=>'name',
            'value'=>'#ff00ff',
            'required'=>true
        );
        $form = new ColorFormBuilder($attr);
        $attrs = $form->getAttributes();
        $expect = array('required="required"');
        $this->assertEquals($expect, $attrs);
    }
}
