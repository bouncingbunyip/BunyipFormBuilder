<?php
require_once '../Autoloader.php';
use BunyipFormBuilder\FormBuilder;
use BunyipFormBuilder\elements\TextFormBuilder;

include 'helpers.php';



$attr = [
    'label'=>'Name',
    'id'=>'name-id',
    'name'=>'name'
];
$form = new FormBuilder($attr);

$attr = [
    'label'=>'Name',
    'id'=>'name-id',
    'name'=>'name'
];
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