<?php

require_once '../vendor/autoload.php';
use BunyipFormBuilder\FormBuilder;
use BunyipFormBuilder\elements\TextFormBuilder;

include 'helpers.php';

$form = new FormBuilder();
$form->setTheme('bootstrap');

$fieldset = $form->addFieldset('test', 'id', 'name');

$attr = array(
    'label'=>'Name',
    'id'=>'name-id',
    'name'=>'name',
    'placeholder'=>'placeholder text'
);
$form->addElem(new TextFormBuilder($attr), $fieldset);
$form->setFieldset($fieldset);

writeHeader();
writeCode($form->render());
writeHtml($form->render());
writeFooter();