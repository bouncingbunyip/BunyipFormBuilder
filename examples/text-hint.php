<?php

require_once '../Autoloader.php';
use BunyipFormBuilder\FormBuilder;
use BunyipFormBuilder\elements\TextFormBuilder;
use BunyipFormBuilder\decorators\HintDecorator;

include 'helpers.php';

$form = new FormBuilder();
$attributes = array('class'=>'hint--bottom-right', 'trigger'=>'Hint', 'text'=> 'This is the tooltip text');
$tooltip = new HintDecorator($attributes);

$fieldset = $form->addFieldset('testing', 'id', 'name');

$attr = array(
    'label'=>'Name',
    'id'=>'name-id',
    'name'=>'name',
    'tooltip'=>$tooltip,
    'template' => 'TextHintTemplate'
);
$form->addElem(new TextFormBuilder($attr), $fieldset);
$form->setFieldset($fieldset);

writeHeader();
writeCode($form->render());
writeHtml($form->render());

$form = new FormBuilder();
$attributes = array('class'=>'hint--right hint--error hint--bounce', 'trigger'=>'Hint', 'text'=> 'This is the tooltip text');
$tooltip = new HintDecorator($attributes);

$fieldset = $form->addFieldset('testing', 'id', 'name');

$attr = array(
    'label'=>'Name',
    'id'=>'name-id',
    'name'=>'name',
    'tooltip'=>$tooltip,
    'template' => 'TextHintTemplate'
);
$form->addElem(new TextFormBuilder($attr), $fieldset);
$form->setFieldset($fieldset);

writeCode($form->render());
writeHtml($form->render());
writeFooter();