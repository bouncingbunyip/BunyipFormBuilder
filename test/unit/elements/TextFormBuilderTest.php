<?php


namespace BunyipFormBuilder;

use PHPUnit\Framework\TestCase;
use BunyipFormBuilder\elements\TextFormBuilder;
/**
 * TextFormBuilder test case.
 */
class TextFormBuilderTest extends TestCase
{
    public function testRender() {
        $attr = array(
            'label'=>'Name',
            'id'=>'name-id',
            'name'=>'name',
            'value'=>'Big Bob',
            'required'=>true,
            'autofocus'=>'name',
            'class'=>'name',
            'error'=>'There is an error here',
        );
        $form = new TextFormBuilder($attr);

        $expected = '<label for="name-id">Name</label>
<input type="text" id="name-id" name="name" value="Big Bob" required="required" autofocus class="name error">
<span class="err-msg">There is an error here</span>';
        
        $actual = $form->render();
        $this->assertEquals($expected, $actual);
    }
}

