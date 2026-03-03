<?php

require_once '../vendor/autoload.php';
use BunyipFormBuilder\elements\TextFormbuilder;
include 'helpers.php';

writeHeader();

$attr = array(
    'name'=>'name',
    'label'=>'Username',
    'placeholder'=>"Username"
);
$form = new TextFormBuilder($attr);
$form->setTheme('Bootstrap');
$form->setTemplate('TextTemplate');
writeCode($form->render());
writeHtml($form->render());

$attr = array(
    'label'=>'Name',
    'id'=>'name-id',
    'name'=>'name'
);

writeFooter();
