<?php
/**
 * for more info on opentip: http://www.opentip.org/index.html
 */
include 'helpers.php';

include '../../../FormBuilder/FormBuilder.php';
include '../../../FormBuilder/ElementFormBuilder.php';
include '../../../FormBuilder/elements/TextFormBuilder.php';
include '../../../FormBuilder/templates/TextOpentipTemplate.php';

include '../../../FormBuilder/decorators/OpentipDecorator.php';

use \FormBuilder\FormBuilder;
use \FormBuilder\OpentipDecorator;
use \FormBuilder\TextFormBuilder;

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
?>