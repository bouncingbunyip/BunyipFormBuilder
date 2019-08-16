<?php

include 'helpers.php';
include '../../../FormBuilder/FormBuilder.php';

// array('accept-charset', 'action', 'autocomplete', 'enctype', 'id', 'method', 'name', 'novalidate', 'target')

writeHeader();
/** ----basic form-----------------------------------------------------------**/
$attr = array(
    'label'=>'Name',
    'id'=>'name-id',
    'name'=>'name'
);
$form = new \FormBuilder\FormBuilder($attr);
$expect = '<form class="vi-form" action="index.php" id="name-id" method="post" name="name">
</form>
';
$actual = $form->render();

writeCode($actual);
writeHtml($actual);
writeExpect($expect, $actual);
/** ----accept-charset-------------------------------------------------------**/
$attr = array(
    'label'=>'Name',
    'accept-charset'=>'UTF-8',
    'name'=>'name'
);
$form = new \FormBuilder\FormBuilder($attr);
$expect = '<form class="vi-form" accept-charset="UTF-8" action="index.php" method="post" name="name">
</form>
';
$actual = $form->render();

writeCode($actual);
writeHtml($actual);
writeExpect($expect, $actual);
/** ----action---------------------------------------------------------------**/
$attr = array(
    'label'=>'Name',
    'action'=>'form.php',
    'name'=>'name'
);
$form = new \FormBuilder\FormBuilder($attr);
$expect = '<form class="vi-form" action="form.php" method="post" name="name">
</form>
';
$actual = $form->render();
writeCode($actual);
writeHtml($actual);
writeExpect($expect, $actual);
/** ----autocomplete---------------------------------------------------------**/
$attr = array(
    'label'=>'Name',
    'autocomplete'=>'on',
    'name'=>'name'
);
$form = new \FormBuilder\FormBuilder($attr);
$expect = '<form class="vi-form" action="index.php" autocomplete="on" method="post" name="name">
</form>
';
$actual = $form->render();
writeCode($actual);
writeHtml($actual);
writeExpect($expect, $actual);
/** ----autocomplete foo-----------------------------------------------------**/
$attr = array(
    'label'=>'Name',
    'autocomplete'=>'foo',
    'name'=>'name'
);
$form = new \FormBuilder\FormBuilder($attr);
$expect = '<form class="vi-form" action="index.php" autocomplete="off" method="post" name="name">
</form>
';
$actual = $form->render();
writeCode($actual);
writeHtml($actual);
writeExpect($expect, $actual);
/** ----enctype--------------------------------------------------------------**/
$attr = array(
    'label'=>'Name',
    'enctype'=>'application/x-www-form-urlencoded',
    'name'=>'name'
);
$form = new \FormBuilder\FormBuilder($attr);
$expect = '<form class="vi-form" action="index.php" enctype="application/x-www-form-urlencoded" method="post" name="name">
</form>
';
$actual = $form->render();
writeCode($actual);
writeHtml($actual);
writeExpect($expect, $actual);
/** ----enctype foo----------------------------------------------------------**/
$attr = array(
    'label'=>'Name',
    'enctype'=>'foo',
    'name'=>'name'
);
$form = new \FormBuilder\FormBuilder($attr);
$expect = '<form class="vi-form" action="index.php" enctype="application/x-www-form-urlencoded" method="post" name="name">
</form>
';
$actual = $form->render();
writeCode($actual);
writeHtml($actual);
writeExpect($expect, $actual);
/** ----method---------------------------------------------------------------**/
$attr = array(
    'action'=>'form.php',
    'method'=>'get',
    'id'=>'name-id',
    'name'=>'name'
);
$form = new \FormBuilder\FormBuilder($attr);
$expect = '<form class="vi-form" action="form.php" id="name-id" method="get" name="name">
</form>
';
$actual = $form->render();
/** ----method foo-----------------------------------------------------------**/
$attr = array(
    'action'=>'form.php',
    'method'=>'foo',
    'id'=>'name-id',
    'name'=>'name'
);
$form = new \FormBuilder\FormBuilder($attr);
$expect = '<form class="vi-form" action="form.php" id="name-id" method="post" name="name">
</form>
';
$actual = $form->render();
writeCode($actual);
writeHtml($actual);
writeExpect($expect, $actual);
/** ----novalidate-----------------------------------------------------------**/
$attr = array(
    'label'=>'Name',
    'action'=>'form.php',
    'novalidate'=>true,
    'name'=>'name'
);
$form = new \FormBuilder\FormBuilder($attr);
$expect = '<form class="vi-form" action="form.php" method="post" name="name" novalidate>
</form>
';
$actual = $form->render();
writeCode($actual);
writeHtml($actual);
writeExpect($expect, $actual);
/** ----novalidate foo-------------------------------------------------------**/
$attr = array(
    'label'=>'Name',
    'action'=>'form.php',
    'novalidate'=>'foo',
    'name'=>'name'
);
$form = new \FormBuilder\FormBuilder($attr);
$expect = '<form class="vi-form" action="form.php" method="post" name="name" novalidate>
</form>
';
$actual = $form->render();
writeCode($actual);
writeHtml($actual);
writeExpect($expect, $actual);
/** ----target---------------------------------------------------------------**/
$attr = array(
    'label'=>'Name',
    'action'=>'form.php',
    'target'=>'foo',
    'name'=>'name'
);
$form = new \FormBuilder\FormBuilder($attr);
$expect = '<form class="vi-form" action="form.php" method="post" name="name" target="_self">
</form>
';
$actual = $form->render();
writeCode($actual);
writeHtml($actual);
writeExpect($expect, $actual);
/** ----arbitrary values strict=true-----------------------------------------**/
$attr = array(
    'label'=>'Name',
    'action'=>'form.php',
    'foo'=>'bar',
    'name'=>'name'
);
$form = new \FormBuilder\FormBuilder($attr);
$expect = '<form class="vi-form" action="form.php" method="post" name="name">
</form>
';
$actual = $form->render();
writeCode($actual);
writeHtml($actual);
writeExpect($expect, $actual);
/** ----arbitrary values strict=false-----------------------------------------**/
$attr = array(
    'label'=>'Name',
    'action'=>'form.php',
    'foo'=>'bar',
    'name'=>'name'
);
$form = new \FormBuilder\FormBuilder($attr);
$form->setStrict(false);
$form->setFormAttributes(array('foo'=>'bar'));
$expect = '<form class="vi-form" action="form.php" method="post" name="name" foo="bar">
</form>
';
$actual = $form->render();
writeCode($actual);
writeHtml($actual);
writeExpect($expect, $actual);

//$attr = array(
//    'accept-charset'=>'',
//    'action'=>'form.php',
//    'autocomplete'=>'oasfdn',
//    'enctype'=>'',
//    'method'=>'posasdft',
//    'novalidate'=>true,
//    'target'=>'_self',
//    'label'=>'Name',
//    'id'=>'name-id',
//    'name'=>'name'
//);
//$form = new FormBuilder($attr);
//$expect = '<form class="vi-form" action="form.php" autocomplete="off" id="name-id" method="post" name="name" novalidate target="_self">
//</form>
//';
//$actual = $form->render();
//
//writeCode($actual);
//writeHtml($actual);
//writeExpect($expect, $actual);

writeFooter();