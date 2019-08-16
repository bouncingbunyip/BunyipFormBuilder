<?php

include 'helpers.php';

include '../../../FormBuilder/ElementFormBuilder.php';
include '../../../FormBuilder/elements/ButtonFormBuilder.php';
include '../../../FormBuilder/templates/ButtonDefaultTemplate.php';

writeHeader();

$attr = array(
    'value'=>'Name',
    'id'=>'name-id',
    'name'=>'name'
);
$expect = '<input type="button" id="name-id" name="name" value="Name">
';
$form = new \FormBuilder\ButtonFormBuilder($attr);
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
$form = new \FormBuilder\ButtonFormBuilder($attr);
writeCode($form->render());
writeHtml($form->render());
writeExpect($expect, $form->render());
writeFooter();

?>