<?php
/**
 * 
 */
require_once '../Autoloader.php';
use BunyipFormBuilder\FormBuilder;
use BunyipFormBuilder\elements\TextFormbuilder;
use BunyipFormBuilder\decorators\HintDecorator;

include 'helpers.php';

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