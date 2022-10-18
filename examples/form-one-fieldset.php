<?php

require_once '../Autoloader.php';
use BunyipFormBuilder\FormBuilder;
use BunyipFormBuilder\elements\TextFormBuilder;

include 'helpers.php';

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