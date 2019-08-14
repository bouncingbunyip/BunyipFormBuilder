<?php

include 'helpers.php';

include '../../../FormBuilder/ElementFormBuilder.php';
include '../../../FormBuilder/elements/EmailFormBuilder.php';
include '../../../FormBuilder/templates/EmailDefaultTemplate.php';
writeHeader();
$attr = array(
    'name'=>'name'
);
$form = new \FormBuilder\EmailFormBuilder($attr);
writeCode($form->render());
writeHtml($form->render());

$attr = array(
    'label'=>'Email',
    'id'=>'name-id',
    'name'=>'name',
    'value'=>'me@mail.com'
);
$form = new \FormBuilder\EmailFormBuilder($attr);
writeCode($form->render());
writeHtml($form->render());


writeFooter();


?>