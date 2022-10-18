<?php

require_once '../Autoloader.php';
use BunyipFormBuilder\FormBuilder;
use BunyipFormBuilder\decorators\HintDecorator;
use BunyipFormBuilder\elements\SubmitFormBuilder;
use BunyipFormBuilder\elements\TextFormBuilder;
use BunyipFormBuilder\elements\PasswordFormBuilder;
use BunyipFormBuilder\elements\HiddenCsrfFormBuilder;

include 'helpers.php';

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