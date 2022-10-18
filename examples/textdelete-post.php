<?php

include 'helpers.php';

include '../../../BunyipFormBuilder/ElementFormBuilder.php';
include '../../../BunyipFormBuilder/elements/TextDeleteFormBuilder.php';
include '../../../BunyipFormBuilder/templates/TextDeletePostTemplate.php';
writeHeader();

$attr = array(
    'label'=>'Name',
    'id'=>'name-id',
    'name'=>'name',
    'action'=>'delete.php',
    'deleteId'=>123,
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


?>