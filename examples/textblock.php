<?php

require_once '../Autoloader.php';
use BunyipFormBuilder\elements\TextBlockFormBuilder;

include 'helpers.php';

writeHeader();
$attr = array(
    'name'=>'name'
);
$form = new TextBlockFormBuilder($attr);
$expect = '<div>
    <div class="text_block"></div>
</div>
';
$actual = $form->render();
writeCode($actual);
writeHtml($actual);
writeExpect($expect, $actual);

$attr = array(
    'label'=>'Name',
    'id'=>'name-id',
    'name'=>'name'
);
$form = new TextBlockFormBuilder($attr);
$expect = '<div>
    <div class="legend">Name</div>
    <div class="text_block"></div>
</div>
';
$actual = $form->render();
writeCode($actual);
writeHtml($actual);
writeExpect($expect, $actual);

$attr = array(
    'label'=>'Name',
    'id'=>'name-id',
    'name'=>'name',
    'content'=>'Big Bob',
    'class'=>'name',
    'error'=>'There is an error here',
);
$form = new TextBlockFormBuilder($attr);
$expect = '<div class="name error">
    <div class="legend">Name</div>
    <div class="text_block">Big Bob</div>
    <span class="err-msg">There is an error here</span>
</div>
';
$actual = $form->render();
writeCode($actual);
writeHtml($actual);
writeExpect($expect, $actual);

writeFooter();
