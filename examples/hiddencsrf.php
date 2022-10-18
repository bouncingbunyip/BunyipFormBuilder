<?php

require_once '../Autoloader.php';
use BunyipFormBuilder\FormBuilder;
use BunyipFormBuilder\elements\HiddenCsrfFormbuilder;

include 'helpers.php';

writeHeader();

$attr = array(
    'value'=>FormBuilder::getCsrf(),
    'id'=>FormBuilder::VICSRF,
    'name'=>FormBuilder::VICSRF
);
$form = new HiddenCsrfFormBuilder($attr);
writeCode($form->render());
writeHtml($form->render());

$attr = array(
    'value'=>FormBuilder::getCsrf(),
    'id'=>'myid',
    'name'=>'myname'
);
$form = new HiddenCsrfFormBuilder($attr);
writeCode($form->render());
writeHtml($form->render());

$attr = array(
    'value'=>FormBuilder::getCsrf(),
    'name'=>FormBuilder::VICSRF
);
$form = new HiddenCsrfFormBuilder($attr);
writeCode($form->render());
writeHtml($form->render());

writeFooter();
