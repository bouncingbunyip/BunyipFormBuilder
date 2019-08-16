<?php

include 'helpers.php';

include '../../../FormBuilder/ElementFormBuilder.php';
include '../../../FormBuilder/elements/CheckboxFormBuilder.php';
include '../../../FormBuilder/templates/CheckboxDefaultTemplate.php';
writeHeader();

$attr = array(
    'label'    => 'Size',
    'required' => false,
    'name'     => 'size',
    'options'  => array(
        0 => array('value'=>'s', 'label'=>'Small', 'selected'=>true),
        1 => array('value'=>'m', 'label'=>'Medium', 'selected'=>false),
        2 => array('value'=>'l', 'label'=>'Large', 'selected'=>false),
        3 => array('value'=>'xl', 'label'=>'Extra Large', 'selected'=>false)
    )
);
$form = new \FormBuilder\CheckboxFormBuilder($attr);
//writeCode(var_export($attr, true));
writeCode($form->render());
writeHtml($form->render());

$attr = array(
    'label'    => 'Size',
    'required' => true,
    'name'     => 'size',
    'error'    => 'this is not an error',
    'csserror' => 'error-css',
    'options'  => array(
        0 => array('value'=>'s', 'label'=>'Small', 'selected'=>false),
        1 => array('value'=>'m', 'label'=>'Medium', 'selected'=>false),
        2 => array('value'=>'l', 'label'=>'Large', 'selected'=>true),
        3 => array('value'=>'xl', 'label'=>'Extra Large', 'selected'=>false)
    )
);
$form = new \FormBuilder\CheckboxFormBuilder($attr);
writeCode($form->render());
writeHtml($form->render());
writeFooter();

?>