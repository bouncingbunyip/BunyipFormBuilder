<?php

include 'helpers.php';

include '../../../BunyipFormBuilder/ElementFormBuilder.php';
include '../../../BunyipFormBuilder/elements/TextDeleteFormBuilder.php';
include '../../../BunyipFormBuilder/templates/TextDeleteDefaultTemplate.php';

use \FormBuilder\TextDeleteFormBuilder;

writeHeader();
$attr = array(
    'name'=>'name'
);
$expect = '<label for="name"></label>
<input type="text" id="name" name="name" value="">
<a href="index.php?p=delete_email&id=name"><img src="images/icn_round_delete.png" class="icn_with_input"></a>
';
$form = new TextDeleteFormBuilder($attr);
writeCode($form->render());
writeHtml($form->render());
writeExpect($expect, $form->render());

$attr = array(
    'label'=>'Name',
    'id'=>'name-id',
    'name'=>'name'
);
$expect = '<label for="name-id">Name</label>
<input type="text" id="name-id" name="name" value="">
<a href="index.php?p=delete_email&id=name-id"><img src="images/icn_round_delete.png" class="icn_with_input"></a>
';
$form = new TextDeleteFormBuilder($attr);
writeCode($form->render());
writeHtml($form->render());
writeExpect($expect, $form->render());

$attr = array(
    'label'=>'Name',
    'id'=>'n1234',
    'name'=>'name',
    'value'=>'Big Bob',
    'required'=>true,
    'autofocus'=>'name',
    'class'=>'name',
    'error'=>'There is an error here',
);
$expect = '<label for="n1234">Name</label>
<input type="text" id="n1234" name="name" value="Big Bob" required="required" autofocus class="name error">
<a href="index.php?p=delete_email&id=n1234"><img src="images/icn_round_delete.png" class="icn_with_input"></a>
<span class="err-msg">There is an error here</span>';
$form = new TextDeleteFormBuilder($attr);
writeCode($form->render());
writeHtml($form->render());
writeExpect($expect, $form->render());

writeFooter();


?>