<?php

include 'helpers.php';

include '../../../FormBuilder/FormBuilder.php';
include '../../../FormBuilder/ElementFormBuilder.php';
include '../../../FormBuilder/elements/TextFormBuilder.php';
include '../../../FormBuilder/templates/TextDefaultTemplate.php';
use \FormBuilder\FormBuilder;
use \FormBuilder\TextFormBuilder;

$attr = array(
    'label'=>'Name',
    'id'=>'name-id',
    'name'=>'name'
);
$form = new FormBuilder($attr);

$attr = array(
    'label'=>'Name',
    'id'=>'name-id',
    'name'=>'name'
);
$form->addElem(new TextFormBuilder($attr));
writeHeader();
writeCode($form->render());
writeHtml($form->render());

$attr = array(
    'accept-charset'=>'',
    'action'=>'form.php',
    'autocomplete'=>'oasfdn',
    'enctype'=>'',
    'method'=>'posasdft',
    'novalidate'=>true,
    'target'=>'_self',
    'label'=>'Name',
    'id'=>'name-id',
    'name'=>'name'
);
$form = new FormBuilder($attr);
writeCode($form->render());
writeHtml($form->render());
writeFooter();