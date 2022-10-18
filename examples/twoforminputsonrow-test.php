<?php

require_once '../Autoloader.php';
use BunyipFormBuilder\elements\SelectFormbuilder;
use BunyipFormBuilder\elements\TextFormbuilder;
use BunyipFormBuilder\elements\TwoFormInputsOnRowFormBuilder;
include 'helpers.php';

writeHeader();

$attr = array(
    'label'    => 'State',
    'required' => false,
    'name'     => 'state',
    'class'      => 'cssclass',
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
    'name'=>'name'
);
$form2 = new TextFormBuilder($attr);
$text = $form2->render();

$attr = array(
    'left' => $select,
    'right' => $text,
    'css' => 'div#left {
  float: left;
  width: 65%;
}
div#right {
  float: right;
}
'
);
$form3 = new TwoFormInputsOnRowFormBuilder($attr);

writeCode($form3->render());
writeHtml($form3->render());

writeFooter();
