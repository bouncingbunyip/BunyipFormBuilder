<?php

require_once '../Autoloader.php';
use BunyipFormBuilder\elements\SubmitFormbuilder;
include 'helpers.php';

writeHeader();
$attr = array(
    'name'=>'submit'
);
$form = new SubmitFormBuilder($attr);
writeCode($form->render());
writeHtml($form->render());

$attr = array(
    'value'=>'Name',
    'id'=>'name-id',
    'name'=>'name'
);
$form = new SubmitFormBuilder($attr);
writeCode($form->render());
writeHtml($form->render());

$attr = array(
    'id'=>'name-id',
    'name'=>'name',
    'value'=>'Big Bob',
    'class'=>'name',
);
$form = new SubmitFormBuilder($attr);
writeCode($form->render());
writeHtml($form->render());
writeFooter();
