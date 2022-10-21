<?php

require_once '../Autoloader.php';
use BunyipFormBuilder\elements\DatalistFormBuilder;
include 'helpers.php';

writeHeader();

$attr = array(
    'label'    => 'State',
    'list'     => 'states',
    'required' => false,
    'name'     => 'state',
    'error'    => 'this is not an error',
    'class'      => 'cssclass',
    'options'  => array(
        0 => array('value'=>'AL', 'selected'=>true),
        1 => array('value'=>'CA', 'selected'=>false),
        2 => array('value'=>'MN', 'selected'=>false),
        3 => array('value'=>'TX', 'selected'=>false)
    )
);
$form = new DatalistFormBuilder($attr);
writeCode($form->render());
writeHtml($form->render());

writeFooter();