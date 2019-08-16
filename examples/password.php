<?php

include 'helpers.php';

include '../../../FormBuilder/ElementFormBuilder.php';
include '../../../FormBuilder/elements/PasswordFormBuilder.php';
include '../../../FormBuilder/templates/PasswordDefaultTemplate.php';
use \FormBuilder\PasswordFormBuilder;

writeHeader();
$attr = array(
    'name'=>'name'
);
$form = new PasswordFormBuilder($attr);
writeCode($form->render());
writeHtml($form->render());

$attr = array(
    'label'=>'Password',
    'id'=>'name-id',
    'name'=>'name',
    'value'=>'abcdefg'
);
$form = new PasswordFormBuilder($attr);
writeCode($form->render());
writeHtml($form->render());


writeFooter();


?>