<?php

require_once '../Autoloader.php';
use BunyipFormBuilder\Formbuilder;
use BunyipFormBuilder\elements\SelectFormbuilder;
use BunyipFormBuilder\elements\TextFormbuilder;
use BunyipFormBuilder\elements\TwoFormInputsOnRowFormBuilder;

include 'helpers.php';

// <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

writeHeader();
$attr = array(
    'action'=>'echo.php',
    'method'=>'post',
    'id'=>'name-id',
    'name'=>'name'
);

$form = new FormBuilder($attr);
$form->registerExternal('https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css', 'css');

$attr = array(
    'label'    => 'State',
    'required' => false,
    'name'     => 'state',
    'class'      => 'form-control',
    'options'  => array(
        0 => array('value'=>'AL', 'label'=>'Alabama', 'selected'=>true),
        1 => array('value'=>'CA', 'label'=>'California', 'selected'=>false),
        2 => array('value'=>'MN', 'label'=>'Maine', 'selected'=>false),
        3 => array('value'=>'TX', 'label'=>'Texas', 'selected'=>false)
    )
);
$form1 = new SelectFormBuilder($attr);
$select = $form1->render();

$attr = array(
    'label'=>'Name',
    'id'=>'name-id',
    'name'=>'name',
    'class' => 'form-control'
);
$form2 = new TextFormBuilder($attr);
$text = $form2->render();

$attr = array(
    'left' => $select,
    'right' => $text,
    'template' => 'TwoTextInputsOnGridTemplate'
);
$form->addElem(new TwoFormInputsOnRowFormBuilder($attr));

writeCode($form->render());
writeHtml($form->render());


writeFooter();