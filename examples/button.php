<?php
require_once '../Autoloader.php';
use BunyipFormBuilder\FormBuilder;
use BunyipFormBuilder\elements\ButtonFormBuilder;
include 'helpers.php';


writeHeader();

$attr = array(
    'value'=>'Name',
    'id'=>'name-id',
    'name'=>'name'
);
$expect = '<input type="button" id="name-id" name="name" value="Name">
';
$form = new ButtonFormBuilder($attr);
writeCode($form->render());
writeHtml($form->render());
writeExpect($expect, $form->render());

$attr = array(
    'id'=>'name-id',
    'name'=>'name',
    'value'=>'Big Bob',
    'class'=>'name',
    'onclick'=>'alert(\'Hello World!\')'
);
$expect = '<input type="button" id="name-id" name="name" value="Big Bob" class="name" onclick="alert(\'Hello World!\')">
';
$form = new ButtonFormBuilder($attr);
writeCode($form->render());
writeHtml($form->render());
writeExpect($expect, $form->render());
writeFooter();
