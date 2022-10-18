<?php

require_once '../Autoloader.php';
use BunyipFormBuilder\elements\DateFormBuilder;

include 'helpers.php';

$attr = array(
    'value'=>'2015-05-05',
    'id'=>'name-id',
    'name'=>'name'
);
$form = new DateFormBuilder($attr);
writeHeader();
writeCode($form->render());
writeHtml($form->render());

$attr = array(
    'value'=>'2015-05-05',
    'id'=>'name-id',
    'name'=>'name',
    'error'=>'This is an error'
);
$form = new DateFormBuilder($attr);
writeCode($form->render());
writeHtml($form->render());

writeFooter();
