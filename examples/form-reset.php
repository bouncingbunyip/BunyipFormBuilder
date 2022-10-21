<?php
require_once '../Autoloader.php';
use BunyipFormBuilder\FormBuilder;
use BunyipFormBuilder\elements\TextFormBuilder;
use BunyipFormBuilder\elements\ResetFormBuilder;

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

$form->addElem(new ResetFormBuilder());

writeHeader();
writeCode($form->render());
writeHtml($form->render());

writeFooter();