<?php

require_once '../Autoloader.php';
use BunyipFormBuilder\elements\SelectFormbuilder;
include 'helpers.php';

writeHeader();

$attr = array(
    'label'    => 'State',
    'required' => false,
    'name'     => 'state',
    'error'    => 'this is not an error',
    'class'      => 'form-select',
    'options'  => array(
        0 => array('value'=>'AL', 'label'=>'Alabama', 'selected'=>true),
        1 => array('value'=>'CA', 'label'=>'California', 'selected'=>false),
        2 => array('value'=>'MN', 'label'=>'Maine', 'selected'=>false),
        3 => array('value'=>'TX', 'label'=>'Texas', 'selected'=>false)
    )
);
$form = new SelectFormBuilder($attr);
$form->setTheme('Bootstrap');
$form->setTemplate('SelectTemplate');
writeCode($form->render());
writeHtml($form->render());

$attr = array(
    'label'    => 'State',
    'required' => true,
    'name'     => 'state',
    'options'  => array(
        0 => array('value'=>'AL', 'label'=>'Alabama', 'selected'=>true),
        1 => array('value'=>'CA', 'label'=>'California', 'selected'=>false),
        2 => array('value'=>'MN', 'label'=>'Maine', 'selected'=>false),
        3 => array('value'=>'TX', 'label'=>'Texas', 'selected'=>false)
    )
);
$form = new SelectFormBuilder($attr);
$form->setTheme('Bootstrap');
$form->setTemplate('SelectTemplate');

writeCode($form->render());
writeHtml($form->render());

writeFooter();
