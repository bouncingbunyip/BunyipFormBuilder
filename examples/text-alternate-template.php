<?php

require_once '../Autoloader.php';
use BunyipFormBuilder\elements\TextFormbuilder;
include 'helpers.php';

writeHeader();

$attr = array(
    'name'=>'name'
);
$form = new TextFormBuilder($attr);
$form->setTemplate('TextAlternateTemplate');
writeCode($form->render());
writeHtml($form->render());

$attr = array(
    'label'=>'Name',
    'id'=>'name-id',
    'name'=>'name'
);
$form = new TextFormBuilder($attr);
$form->setTemplate('TextAlternateTemplate');
writeCode($form->render());
writeHtml($form->render());

$attr = array(
    'label'=>'Name',
    'id'=>'name-id',
    'name'=>'name',
    'value'=>'Big Bob',
    'required'=>true,
    'autofocus'=>'name',
    'class'=>'name',
    'error'=>'There is an error here',
);
$form = new TextFormBuilder($attr);
$form->setTemplate('TextAlternateTemplate');
writeCode($form->render());
writeHtml($form->render());

writeFooter();
