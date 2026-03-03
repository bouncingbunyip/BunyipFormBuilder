<?php

require_once '../vendor/autoload.php';
use BunyipFormBuilder\elements\ResetFormbuilder;
include 'helpers.php';

writeHeader();

$form = new ResetFormBuilder();
writeCode($form->render());
writeHtml($form->render());

$attr = array(
    'class'=>'css-class'
);
$form = new ResetFormBuilder($attr);
writeCode($form->render());
writeHtml($form->render());


writeFooter();
