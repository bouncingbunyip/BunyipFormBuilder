<?php

require_once '../Autoloader.php';
use BunyipFormBuilder\FormBuilder;
use BunyipFormBuilder\elements\DatePickerFormbuilder;
use BunyipFormBuilder\decorators\DatePickerDecorator;

include 'helpers.php';

$attr = array(
    'label'=>'Name',
    'id'=>'name-id',
    'name'=>'name'
);
$form = new FormBuilder($attr);
$form->registerExternal('//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css', 'css');
$form->registerExternal('//code.jquery.com/jquery-1.10.2.js', 'js');
$form->registerExternal('//code.jquery.com/ui/1.11.4/jquery-ui.js', 'js');

$attributes = array('class'=>'hint--right', 'trigger'=>'Hint', 'text'=> 'This is the tooltip text');
$decorator = new DatePickerDecorator($attributes);

$attr = array(
    'value'=>'2014-05-05',
    'id'=>'asdf1',
    'name'=>'name',
    'datepicker' => $decorator
);
$form->addElem(new DatePickerFormBuilder($attr));

writeHeader();
writeCode($form->render());
writeHtml($form->render());

writeFooter();