<?php

include 'helpers.php';

include '../../../FormBuilder/ElementFormBuilder.php';
include '../../../FormBuilder/elements/ColorFormBuilder.php';
include '../../../FormBuilder/templates/ColorDefaultTemplate.php';
writeHeader();
$attr = array(
    'name'=>'name'
);
$form = new \FormBuilder\ColorFormBuilder($attr);
writeCode($form->render());
writeHtml($form->render());

$attr = array(
    'label'=>'Color',
    'id'=>'name-id',
    'name'=>'name',
    'value'=>'#ff00ff'
);
$form = new \FormBuilder\ColorFormBuilder($attr);
writeCode($form->render());
writeHtml($form->render());


writeFooter();


?>