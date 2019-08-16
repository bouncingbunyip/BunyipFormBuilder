<?php

include 'helpers.php';

include '../../../FormBuilder/ElementFormBuilder.php';
include '../../../FormBuilder/elements/RangeFormBuilder.php';
include '../../../FormBuilder/templates/RangeDefaultTemplate.php';

use \FormBuilder\RangeFormBuilder;

writeHeader();
$attr = array(
    'name'=>'name'
);
$form = new RangeFormBuilder($attr);
writeCode($form->render());
writeHtml($form->render());

$attr = array(
    'label'=>'Range',
    'id'=>'name2-id',
    'name'=>'name2',
    'value'=>'15',
    'min'=>0,
    'max'=>100
);
$form = new RangeFormBuilder($attr);
writeCode($form->render());
writeHtml($form->render());


writeFooter();


?>