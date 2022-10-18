<?php

include 'helpers.php';

include '../../../BunyipFormBuilder/BunyipFormBuilder.php';
include '../../../BunyipFormBuilder/FieldsetFormBuilder.php';
include '../../../BunyipFormBuilder/ElementFormBuilder.php';
include '../../../BunyipFormBuilder/elements/TextFormBuilder.php';
include '../../../BunyipFormBuilder/templates/TextHintTemplate.php';
include '../../../BunyipFormBuilder/decorators/HintDecorator.php';

$form = new \FormBuilder\FormBuilder();
$attributes = array('class'=>'hint--bottom-right', 'trigger'=>'Hint', 'text'=> 'This is the tooltip text');
$tooltip = new \FormBuilder\HintDecorator($attributes);

$fieldset = $form->addFieldset('testing', 'id', 'name');

$attr = array(
    'label'=>'Name',
    'id'=>'name-id',
    'name'=>'name',
    'tooltip'=>$tooltip,
    'template' => 'TextHintTemplate'
);
$form->addElem(new \FormBuilder\TextFormBuilder($attr), $fieldset);
$form->setFieldset($fieldset);

writeHeader();
writeCode($form->render());
writeHtml($form->render());

$form = new \FormBuilder\FormBuilder();
$attributes = array('class'=>'hint--right hint--error hint--bounce', 'trigger'=>'Hint', 'text'=> 'This is the tooltip text');
$tooltip = new \FormBuilder\HintDecorator($attributes);

$fieldset = $form->addFieldset('testing', 'id', 'name');

$attr = array(
    'label'=>'Name',
    'id'=>'name-id',
    'name'=>'name',
    'tooltip'=>$tooltip,
    'template' => 'TextHintTemplate'
);
$form->addElem(new \FormBuilder\TextFormBuilder($attr), $fieldset);
$form->setFieldset($fieldset);

writeCode($form->render());
writeHtml($form->render());
writeFooter();