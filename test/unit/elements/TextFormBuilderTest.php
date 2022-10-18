<?php


namespace BunyipFormBuilder;

include '../../../ElementFormBuilder.php';
include '../../../elements/TextFormBuilder.php';
include '../../../templates/TextDefaultTemplate.php';

use PHPUnit\Framework\TestCase;
/**
 * TextFormBuilder test case.
 */
class TextFormBuilderTest extends TestCase
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
<input type="text" id="name-id" name="name" value="Big Bob" required="required" autofocus class="name error">';
        
        $actual = $this->TextFormBuilder->render();
        $this->assertEquals($expected, $actual);
    }
}

