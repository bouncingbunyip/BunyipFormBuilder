<?php

include 'helpers.php';

include '../../../FormBuilder/ElementFormBuilder.php';
include '../../../FormBuilder/elements/FileFormBuilder.php';
include '../../../FormBuilder/templates/FileDefaultTemplate.php';
writeHeader();
$attr = array(
    'name'=>'name'
);
$form = new \FormBuilder\FileFormBuilder($attr);
$expect = '<input type="file" id="name" name="name" value="">
';
$actual = $form->render();
writeCode($actual);
writeHtml($actual);
writeExpect($expect, $actual);

$attr = array(
    'label'=>'Name',
    'id'=>'name-id',
    'name'=>'name'
);
$form = new \FormBuilder\FileFormBuilder($attr);
$expect = '<label for="name-id">Name</label>
<input type="file" id="name-id" name="name" value="">
';
$actual = $form->render();
writeCode($actual);
writeHtml($actual);
writeExpect($expect, $actual);

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
$form = new \FormBuilder\FileFormBuilder($attr);
$expect = '<label for="name-id">Name</label>
<input type="file" id="name-id" name="name" value="Big Bob" required="required" autofocus class="name error">
<span class="err-msg">There is an error here</span>';
$actual = $form->render();
writeCode($actual);
writeHtml($actual);
writeExpect($expect, $actual);

writeFooter();


?>