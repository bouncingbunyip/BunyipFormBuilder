<?php

include 'helpers.php';

include '../../../FormBuilder/ElementFormBuilder.php';
include '../../../FormBuilder/elements/AdHocTestFormBuilder.php';
include '../../../FormBuilder/templates/AdHocTestTemplate.php';

use \FormBuilder\AdHocTestFormBuilder;

writeHeader();

$attr = array(
    'html'=>'<p><b>this is some bold text</b></p><br><p>some regular text</p>'
);
$form = new AdHocTestFormBuilder($attr);
$form->setTemplate('AdhocTestTemplate');
writeCode($form->render());
writeHtml($form->render());

$attr = array('html'=>'<style>
input {
  width: 15%;
  float: left;
}

input#right {
  float: right;
}
</style>

<div class="wrapper">
  <input class="inputbold" type="text" name="" placeholder="boldinput" />
  <input id="right" class="inputbold" type="text" name="" placeholder="blah" />
</div>'
);
$form = new AdHocTestFormBuilder($attr);
$form->setTemplate('AdhocTestTemplate');
writeCode($form->render());
writeHtml($form->render());

writeFooter();
?>