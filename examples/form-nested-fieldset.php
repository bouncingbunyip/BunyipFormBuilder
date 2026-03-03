<?php
/**
 * INCOMPLETE
 * 
 * The code in BunyipFormBuilder does not (yet) support parsing nested Fieldsets
 */
require_once '../vendor/autoload.php';
include 'helpers.php';

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