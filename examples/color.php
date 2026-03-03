<?php

require_once '../vendor/autoload.php';
use BunyipFormBuilder\elements\ColorFormBuilder;

include 'helpers.php';
writeHeader();
$attr = array(
    'name'=>'name'
);
$form = new ColorFormBuilder($attr);
writeCode($form->render());
writeHtml($form->render());

$attr = array(
    'label'=>'Color',
    'id'=>'name-id',
    'name'=>'name',
    'value'=>'#ff00ff'
);
$form = new ColorFormBuilder($attr);
writeCode($form->render());
writeHtml($form->render());

writeFooter();
