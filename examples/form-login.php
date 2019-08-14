<?php

include 'helpers.php';

include '../../../FormBuilder/FormBuilder.php';
include '../../../FormBuilder/FieldsetFormBuilder.php';
include '../../../FormBuilder/ElementFormBuilder.php';
include '../../../FormBuilder/elements/TextFormBuilder.php';
include '../../../FormBuilder/templates/TextDefaultTemplate.php';
include '../../../FormBuilder/elements/PasswordFormBuilder.php';
include '../../../FormBuilder/templates/PasswordDefaultTemplate.php';
include '../../../FormBuilder/decorators/HintDecorator.php';
include '../../../FormBuilder/elements/HiddenCsrfFormBuilder.php';
include '../../../FormBuilder/templates/HiddenCsrfDefaultTemplate.php';

include '../../../FormBuilder/elements/SubmitFormBuilder.php';
include '../../../FormBuilder/templates/SubmitDefaultTemplate.php';

use \FormBuilder\FormBuilder;
use \FormBuilder\HintDecorator;
use \FormBuilder\TextFormBuilder;
use \FormBuilder\PasswordFormBuilder;
use \FormBuilder\HiddenCsrfFormBuilder;
use \FormBuilder\SubmitFormBuilder;

$attr = array(
    'action'=>'echo.php',
    'method'=>'post',
    'id'=>'name-id',
    'name'=>'name'
);

$form = new FormBuilder($attr);
$attributes = array('class'=>'hint--right', 'trigger'=>'Hint', 'text'=> 'This is the tooltip text');
$tooltip = new HintDecorator($attributes);

$fieldset = $form->addFieldset('Log In', 'id', 'name');

$attr = array(
    'label'=>'Username',
    'id'=>'username',
    'name'=>'username',
    'tooltip'=>$tooltip
);
$form->addElem(new TextFormBuilder($attr), $fieldset);

$attr = array(
    'label'=>'Password',
    'id'=>'password',
    'name'=>'password'
);
$form->addElem(new PasswordFormBuilder($attr), $fieldset);

$attr = array(
    'value'=>FormBuilder::getCsrf(),
    'id'=>FormBuilder::VICSRF,
    'name'=>FormBuilder::VICSRF
);
$form->addElem(new HiddenCsrfFormBuilder($attr));

$attr = array(
    'value'=>'Submit',
    'id'=>'name-id',
    'name'=>'name'
);
$form->addElem(new SubmitFormBuilder($attr));

$form->setFieldset($fieldset);

writeHeader();
writeCode($form->render());
writeHtml($form->render());
writeFooter();