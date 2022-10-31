<?php

require_once '../Autoloader.php';
use BunyipFormBuilder\elements\PasswordFormbuilder;
include 'helpers.php';

writeHeader();

$attr = array(
    'name'=>'password',
    'label'=>'Password',
    'placeholder'=>"****"
);
$form = new PasswordFormBuilder($attr);
$form->setTheme('Bootstrap');
$form->setTemplate('PasswordTemplate');
writeCode($form->render());
writeHtml($form->render());

$attr = array(
    'label'=>'Name',
    'id'=>'name-id',
    'name'=>'name'
);

writeFooter();
