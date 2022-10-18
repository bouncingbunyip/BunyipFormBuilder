<?php
require_once '../Autoloader.php';
use BunyipFormBuilder\elements\NumberFormbuilder;
include 'helpers.php';


writeHeader();
$attr = array(
    'name'=>'name'
);
$form = new NumberFormBuilder($attr);
writeCode($form->render());
writeHtml($form->render());

$attr = array(
    'label'=>'Number',
    'id'=>'name-id',
    'name'=>'name',
    'value'=>'15',
    'min'=>0,
    'max'=>100
);
$form = new NumberFormBuilder($attr);
writeCode($form->render());
writeHtml($form->render());


writeFooter();
