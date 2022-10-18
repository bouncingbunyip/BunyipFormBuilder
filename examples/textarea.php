<?php

require_once '../Autoloader.php';
use BunyipFormBuilder\elements\TextareaFormbuilder;
include 'helpers.php';

writeHeader();

$attr = array(
    'name'=>'name'
);
$form = new TextareaFormBuilder($attr);
writeCode($form->render());
writeHtml($form->render());

$attr = array(
    'label'=>'Name',
    'id'=>'name-id',
    'name'=>'name'
);
$form = new TextareaFormBuilder($attr);
writeCode($form->render());
writeHtml($form->render());

$attr = array(
    'label'=>'Name',
    'id'=>'name-id',
    'name'=>'name',
    'cols'=>100,
    'rows'=>5
);
$form = new TextareaFormBuilder($attr);
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
$form = new TextareaFormBuilder($attr);
writeCode($form->render());
writeHtml($form->render());
writeFooter();

?>