<?php
/**
 * ColorFormBuilderTest.php
 *
 * @version $Id: $
 * @package BunyipFormBuilder
 * @copyright 2011 - 2020
 */

namespace BunyipFormBuilder;

use PHPUnit\Framework\TestCase;
use BunyipFormBuilder\elements\ColorFormBuilder;

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
