<?php

require_once '../Autoloader.php';
use BunyipFormBuilder\elements\EmailFormBuilder;
include 'helpers.php';

writeHeader();
$attr = array(
    'name'=>'name'
);
$form = new EmailFormBuilder($attr);
$form->setTheme('Bootstrap');
$form->setTemplate('EmailTemplate');

writeCode($form->render());
writeHtml($form->render());

$attr = array(
    'label'=>'Email',
    'id'=>'name-id',
    'name'=>'name',
    'value'=>'me@mail.com'
);
$form = new EmailFormBuilder($attr);
$form->setTheme('Bootstrap');
$form->setTemplate('EmailTemplate');

writeCode($form->render());
writeHtml($form->render());

writeFooter();
