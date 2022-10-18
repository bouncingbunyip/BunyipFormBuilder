<?php
/**
 * CheckboxFormBuilderTest.php
 *
 * @version $Id: $
 * @package BunyipFormBuilder
 * @copyright 2011 - 2020
 */

namespace BunyipFormBuilder;

include '../../../ElementFormBuilder.php';
include '../../../elements/CheckboxFormBuilder.php';

use PHPUnit\Framework\TestCase;

class CheckboxFormBuilderTest extends TestCase
{

    public function testGetOptions()
    {
        $options = ['yes', 'no', 'maybe'];
        $attr = array(
            'value'=>'Name',
            'id'=>'name-id',
            'name'=>'name',
            'options'  => $options,
        );
        $form = new CheckboxFormBuilder($attr);
        $opts = $form->getOptions();
        $this->assertEquals($options, $opts);
    }
}
