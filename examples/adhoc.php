<?php

require_once '../Autoloader.php';

use BunyipFormBuilder\elements\AdHocFormBuilder;

include 'helpers.php';

writeHeader();

$attr = array(
    'html'=>'<p><b>this is some bold text</b></p><br><p>some regular text</p>'
);
$form = new AdHocFormBuilder($attr);
$form->setTemplate('AdHocTemplate');
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
$form = new AdHocFormBuilder($attr);
$form->setTemplate('AdHocTemplate');
writeCode($form->render());
writeHtml($form->render());

writeFooter();
