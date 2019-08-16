<?php
/**
 * 
 */
include 'helpers.php';

include '../../../FormBuilder/FormBuilder.php';
include '../../../FormBuilder/ElementFormBuilder.php';
include '../../../FormBuilder/elements/TextFormBuilder.php';
include '../../../FormBuilder/templates/TextHintTemplate.php';
include '../../../FormBuilder/decorators/HintDecorator.php';
use \FormBuilder\FormBuilder;
use \FormBuilder\HintDecorator;
use \FormBuilder\TextFormBuilder;

writeHeader();
$attr = array(
    'label'=>'Name',
    'id'=>'name-id',
    'name'=>'name',
    'method'=>'post'
);

$form = new FormBuilder($attr); 

$attributes = array('class'=>'hint--right', 'trigger'=>'Hint', 'text'=> 'This is the tooltip text');
$tooltip = new HintDecorator($attributes);
$attr = array(
    'label'=>'Name',
    'id'=>'name-id',
    'name'=>'name',
    'value'=>'Big Bob',
    'required'=>true,
    'autofocus'=>'name',
    'class'=>'name',
    'error'=>'There is an error here',
    'tooltip'=>$tooltip
);

$input = new TextFormBuilder($attr);
$input->setTemplate('TextHintTemplate');
$form->addElem($input);

writeCode($form->render());
writeHtml($form->render());

writeFooter();
?>