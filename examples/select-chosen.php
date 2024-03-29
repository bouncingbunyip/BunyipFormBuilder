<?php

require_once '../Autoloader.php';
use BunyipFormBuilder\FormBuilder;
use BunyipFormBuilder\elements\SelectChosenFormbuilder;

include 'helpers.php';

writeHeader();

$attr = array(
    'label'=>'Name',
    'id'=>'name-id',
    'name'=>'name',
    'method'=>'post'
);

$form = new FormBuilder($attr);
$form->registerExternal('https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js', 'js');
$form->registerExternal('addons/chosen/chosen.jquery.js', 'js');
$form->registerExternal('addons/chosen/chosen.css', 'css');

$attr = array(
    'label'    => 'State',
    'required' => false,
    'name'     => 'state',
    'error'    => 'this is not an error',
    'class'    => 'chosen-select',
    'chosenOptions'    => array('width'=>'500px'),
    'options'  => array(
        0 => array('value'=>'AL', 'label'=>'Alabama', 'selected'=>true),
        1 => array('value'=>'CA', 'label'=>'California', 'selected'=>false),
        2 => array('value'=>'MN', 'label'=>'Maine', 'selected'=>false),
        3 => array('value'=>'TX', 'label'=>'Texas', 'selected'=>false)
    )
);

$form->addElem(new SelectChosenFormBuilder($attr));

writeCode($form->render());
writeHtml($form->render());

writeFooter();
