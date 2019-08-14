<?php

include 'helpers.php';

include '../../../FormBuilder/ElementFormBuilder.php';
include '../../../FormBuilder/elements/HiddenFormBuilder.php';
include '../../../FormBuilder/templates/HiddenDefaultTemplate.php';

use \FormBuilder\HiddenFormBuilder;

writeHeader();
$attr = array(
    'name'=>'name'
);
$expect = '<input type="hidden" id="name" name="name" value="">
';

$form = new HiddenFormBuilder($attr);
$actual = $form->render();
writeCode($actual);
writeHtml($actual);
writeExpect($expect, $actual);

$attr = array(
    'label'=>'Name',
    'id'=>'name-id',
    'name'=>'name'
);
$form = new HiddenFormBuilder($attr);
$expect = '<input type="hidden" id="name-id" name="name" value="">
';

$form = new HiddenFormBuilder($attr);
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
$form = new HiddenFormBuilder($attr);
$expect = '<input type="hidden" id="name-id" name="name" value="Big Bob">
';

$form = new HiddenFormBuilder($attr);
$actual = $form->render();
writeCode($actual);
writeHtml($actual);
writeExpect($expect, $actual);

writeFooter();

?>