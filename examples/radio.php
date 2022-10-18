<?php

require_once '../Autoloader.php';
use BunyipFormBuilder\elements\RadioFormbuilder;
include 'helpers.php';

writeHeader();

$attr = array(
    'label'    => 'Gender',
    'required' => false,
    'name'     => 'gender1',
    'error'    => 'this is not an error',
    'options'  => array(
        0 => array('value'=>'female', 'label'=>'Female', 'selected'=>true),
        1 => array('value'=>'male', 'label'=>'Male', 'selected'=>false),
        2 => array('value'=>'other', 'label'=>'Other', 'selected'=>false),
        3 => array('value'=>'na', 'label'=>'NA', 'selected'=>false)
    )
);
$form = new RadioFormBuilder($attr);
writeCode($form->render());
writeHtml($form->render());

$attr = array(
    'label'    => 'Gender',
    'required' => true,
    'name'     => 'gender2',
    'options'  => array(
        0 => array('value'=>'female', 'label'=>'Female', 'selected'=>true),
        1 => array('value'=>'male', 'label'=>'Male', 'selected'=>true),
        2 => array('value'=>'other', 'label'=>'Other', 'selected'=>false),
        3 => array('value'=>'na', 'label'=>'NA', 'selected'=>false)
    )
);
$form = new RadioFormBuilder($attr);
writeCode($form->render());
writeHtml($form->render());

$attr = array(
    'label'    => 'Gender',
    'required' => true,
    'name'     => 'gender3',
    'selected' => 'other',
    'options'  => array(
        0 => array('value'=>'female', 'label'=>'Female'),
        1 => array('value'=>'male', 'label'=>'Male'),
        2 => array('value'=>'other', 'label'=>'Other'),
        3 => array('value'=>'na', 'label'=>'NA')
    )
);
$form = new RadioFormBuilder($attr);
writeCode($form->render());
writeHtml($form->render());

writeFooter();

?>