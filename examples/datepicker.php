<?php

include 'helpers.php';

include '../../../FormBuilder/FormBuilder.php';
include '../../../FormBuilder/ElementFormBuilder.php';
include '../../../FormBuilder/elements/DatePickerFormBuilder.php';
include '../../../FormBuilder/templates/DatePickerDefaultTemplate.php';
include '../../../FormBuilder/decorators/DatePickerDecorator.php';

$attr = array(
    'label'=>'Name',
    'id'=>'name-id',
    'name'=>'name'
);
$form = new \FormBuilder\FormBuilder($attr);
$form->registerExternal('//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css', 'css');
$form->registerExternal('//code.jquery.com/jquery-1.10.2.js', 'js');
$form->registerExternal('//code.jquery.com/ui/1.11.4/jquery-ui.js', 'js');

$attributes = array('class'=>'hint--right', 'trigger'=>'Hint', 'text'=> 'This is the tooltip text');
$decorator = new \FormBuilder\DatePickerDecorator($attributes);

$attr = array(
    'value'=>'2014-05-05',
    'id'=>'asdf1',
    'name'=>'name',
    'datepicker' => $decorator
);
$form->addElem(new \FormBuilder\DatePickerFormBuilder($attr));

writeHeader();
writeCode($form->render());
writeHtml($form->render());

// $attr = array(
//     'value'=>'2015-05-05',
//     'id'=>'name-id',
//     'name'=>'name',
//     'error'=>'This is an error'
// );
// $form = new DatePickerFormBuilder($attr);
// writeCode($form->render());
// writeHtml($form->render());

writeFooter();

?>