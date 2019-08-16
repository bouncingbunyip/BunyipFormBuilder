<?php

include 'helpers.php';

include '../../../FormBuilder/FormBuilder.php';
include '../../../FormBuilder/FieldsetFormBuilder.php';
include '../../../FormBuilder/ElementFormBuilder.php';
include '../../../FormBuilder/elements/TextFormBuilder.php';
include '../../../FormBuilder/templates/TextDefaultTemplate.php';

use \FormBuilder\FormBuilder;
use \FormBuilder\TextFormBuilder;
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