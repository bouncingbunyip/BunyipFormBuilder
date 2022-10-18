<?php
/**
 * INCOMPLETE
 * 
 * The code in BunyipFormBuilder does not (yet) support parsing nested Fieldsets
 */
include 'helpers.php';

include '../../../BunyipFormBuilder/BunyipFormBuilder.php';
include '../../../BunyipFormBuilder/FieldsetFormBuilder.php';
include '../../../BunyipFormBuilder/ElementFormBuilder.php';
include '../../../BunyipFormBuilder/elements/TextFormBuilder.php';
include '../../../BunyipFormBuilder/templates/TextDefaultTemplate.php';
include '../../../BunyipFormBuilder/decorators/HintDecorator.php';

use \FormBuilder\FormBuilder;
use \FormBuilder\HintDecorator;
use \FormBuilder\TextFormBuilder;

$form = new FormBuilder();
$attributes = array('class'=>'hint--right', 'trigger'=>'Hint', 'text'=> 'This is the tooltip text');
$tooltip = new HintDecorator($attributes);

$fieldset = $form->addFieldset('testing', 'id', 'name');
$childfieldset = $form->addFieldset('child', 'child-id', 'child-name');
$attr = array(
    'label'=>'Name',
    'id'=>'name-id',
    'name'=>'name',
    'tooltip'=>$tooltip
);
$form->addElem(new TextFormBuilder($attr), $childfieldset);
$form->setFieldset($childfieldset);

writeHeader();
writeCode($form->render());
writeHtml($form->render());
writeFooter();