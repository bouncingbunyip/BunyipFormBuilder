<?php
/**
 * for more info on opentip: http://www.opentip.org/index.html
 */
require_once '../Autoloader.php';
use BunyipFormBuilder\FormBuilder;
use BunyipFormBuilder\elements\TextFormbuilder;
use BunyipFormBuilder\decorators\OpentipDecorator;

include 'helpers.php';

writeHeader();
$attr = array(
    'label'=>'Name',
    'id'=>'name-id',
    'name'=>'name',
    'method'=>'post'
);

$form = new FormBuilder($attr); 

$attributes = array('delay'=>'0', 'hideDelay'=>'1', 'stem'=>true, 'fixed'=>true, 'trigger'=>'Hint', 'text'=> 'This is the tooltip text');
$tooltip = new OpentipDecorator($attributes);
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
$input->setTemplate('TextOpentipTemplate');
$form->addElem($input);

writeCode($form->render());
writeHtml($form->render());

writeFooter();
