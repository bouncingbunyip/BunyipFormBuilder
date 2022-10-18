<?php

require_once '../Autoloader.php';
use BunyipFormBuilder\FormBuilder;
use BunyipFormBuilder\elements\TextFormBuilder;

include 'helpers.php';

$form = new FormBuilder();
$first = $form->addFieldset('first', '1id');
$second = $form->addFieldset('second','2id', '2name');

$attr = array(
    'label'=>'Name',
    'id'=>'name-id',
    'name'=>'name'
);
$form->addElem(new TextFormBuilder($attr), $first);
$attr = array(
    'label'=>'Shoe',
    'id'=>'shoe-id',
    'name'=>'shoe',
    'value'=>'Nike'
);
$form->addElem(new TextFormBuilder($attr), $second);
$attr = array(
    'label'=>'Socks',
    'id'=>'sock-id',
    'name'=>'socks',
    'value'=>'Wool',
    'class'=>'socks-css'
);
$form->addElem(new TextFormBuilder($attr), $second);

$form->setFieldset($first);
$form->setFieldset($second);

writeHeader();
writeCode($form->render());
writeHtml($form->render());
writeFooter();