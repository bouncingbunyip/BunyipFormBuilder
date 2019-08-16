<?php

include 'helpers.php';

include '../../../FormBuilder/FormBuilder.php';
include '../../../FormBuilder/ElementFormBuilder.php';
include '../../../FormBuilder/elements/HiddenCsrfFormBuilder.php';
include '../../../FormBuilder/templates/HiddenCsrfDefaultTemplate.php';

writeHeader();

$attr = array(
    'value'=>FormBuilder::getCsrf(),
    'id'=>FormBuilder::VICSRF,
    'name'=>FormBuilder::VICSRF
);
$form = new HiddenCsrfFormBuilder($attr);
writeCode($form->render());
writeHtml($form->render());

$attr = array(
    'value'=>FormBuilder::getCsrf(),
    'id'=>'myid',
    'name'=>'myname'
);
$form = new HiddenCsrfFormBuilder($attr);
writeCode($form->render());
writeHtml($form->render());

$attr = array(
    'value'=>FormBuilder::getCsrf(),
    'name'=>FormBuilder::VICSRF
);
$form = new HiddenCsrfFormBuilder($attr);
writeCode($form->render());
writeHtml($form->render());

writeFooter();

?>