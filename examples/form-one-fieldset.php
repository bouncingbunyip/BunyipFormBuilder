<?php

include 'helpers.php';

include '../../../FormBuilder/FormBuilder.php';
include '../../../FormBuilder/FieldsetFormBuilder.php';
include '../../../FormBuilder/ElementFormBuilder.php';
include '../../../FormBuilder/elements/TextFormBuilder.php';
include '../../../FormBuilder/templates/TextDefaultTemplate.php';
//include '../../../FormBuilder/decorators/HintDecorator.php';
use \FormBuilder\FormBuilder;
use \FormBuilder\TextFormBuilder;

$form = new FormBuilder();
// $attributes = array('class'=>'hint--right', 'trigger'=>'Hint', 'text'=> 'This is the tooltip text');
// $tooltip = new HintDecorator($attributes);

$fieldset = $form->addFieldset('test', 'id', 'name');

$attr = array(
    'label'=>'Name',
    'id'=>'name-id',
    'name'=>'name',
//    'tooltip'=>$tooltip
);
$form->addElem(new TextFormBuilder($attr), $fieldset);
$form->setFieldset($fieldset);

writeHeader();
writeCode($form->render());
writeHtml($form->render());
writeFooter();