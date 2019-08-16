<?php

include 'helpers.php';

include '../../../FormBuilder/ElementFormBuilder.php';
include '../../../FormBuilder/elements/DateFormBuilder.php';
include '../../../FormBuilder/templates/DateDefaultTemplate.php';


$attr = array(
    'value'=>'2015-05-05',
    'id'=>'name-id',
    'name'=>'name'
);
$form = new \FormBuilder\DateFormBuilder($attr);
writeHeader();
writeCode($form->render());
writeHtml($form->render());

$attr = array(
    'value'=>'2015-05-05',
    'id'=>'name-id',
    'name'=>'name',
    'error'=>'This is an error'
);
$form = new \FormBuilder\DateFormBuilder($attr);
writeCode($form->render());
writeHtml($form->render());

writeFooter();

?>