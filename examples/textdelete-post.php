<?php

require_once '../Autoloader.php';
use BunyipFormBuilder\elements\TextDeleteFormbuilder;
include 'helpers.php';

writeHeader();

$attr = array(
    'label'=>'Name',
    'id'=>'name-id',
    'name'=>'name',
    'action'=>'echo.php',
    'deleteId'=>123,
    'form_name'=>'deletepost',
    'method'=>'foo',
    'value'=>'Big Bob',
    'required'=>true,
    'autofocus'=>'name',
    'class'=>'name',
    'error'=>'There is an error here',
);
$form = new TextDeleteFormBuilder($attr);
$form->setTemplate('TextDeletePostTemplate');
writeCode($form->render());
writeHtml($form->render());
writeFooter();
