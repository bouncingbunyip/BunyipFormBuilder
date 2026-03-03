<?php

require_once '../vendor/autoload.php';
use BunyipFormBuilder\elements\PasswordFormbuilder;
include 'helpers.php';

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

$attr = array(
    'label'=>'Required Password',
    'id'=>'req-id',
    'name'=>'req-name',
    'value'=>'hijklmn',
    'required'=>true
);
$form = new PasswordFormBuilder($attr);
writeCode($form->render());
writeHtml($form->render());

writeFooter();
