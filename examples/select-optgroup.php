<?php

include 'helpers.php';

include '../../../FormBuilder/ElementFormBuilder.php';
include '../../../FormBuilder/elements/SelectFormBuilder.php';
include '../../../FormBuilder/templates/SelectDefaultTemplate.php';
use \FormBuilder\SelectFormBuilder;

writeHeader();

$states = array(
        0 => array('value'=>'AL', 'label'=>'Alabama', 'selected'=>true),
        1 => array('value'=>'CA', 'label'=>'California', 'selected'=>false),
        2 => array('value'=>'MN', 'label'=>'Maine', 'selected'=>false),
        3 => array('value'=>'TX', 'label'=>'Texas', 'selected'=>false)
);
$provinces = array(
    0 => array('value'=>'AB', 'label'=>'Alberta', 'selected'=>true),
    1 => array('value'=>'ON', 'label'=>'Ontario', 'selected'=>false),
    2 => array('value'=>'QC', 'label'=>'Quebec', 'selected'=>false),
);

$attr = array(
    'label'    => 'State',
    'required' => true,
    'name'     => 'state',
    'optGroup'  => array(
        'US' => $states,
        'Canada' => $provinces
    )
);
$form = new SelectFormBuilder($attr);
writeCode($form->render());
writeHtml($form->render());

writeFooter();

?>