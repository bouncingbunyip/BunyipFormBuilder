<?php

require_once '../Autoloader.php';
use BunyipFormBuilder\FormBuilder;
use BunyipFormBuilder\decorators\HtmlDecorator;
use BunyipFormBuilder\elements\{SubmitFormBuilder, TextFormBuilder, PasswordFormBuilder, HiddenCsrfFormBuilder};

include 'helpers.php';

$attr = array(
    'action'=>'echo.php',
    'method'=>'post',
    'id'=>'name-id',
    'name'=>'name'
);

$form = new FormBuilder($attr);
$attributes = array('class'=>'html-deco', 'html'=>'<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/51/Mr._Smiley_Face.svg/2048px-Mr._Smiley_Face.svg.png" width="50" height="50"/>');
$html = new HtmlDecorator($attributes);

$fieldset = $form->addFieldset('Example Login Form', 'id', 'name');

$attr = array(
    'label'=>'Username',
    'id'=>'username',
    'name'=>'username',
    'decorator'=>$html
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
    'id'=>FormBuilder::BUNYIPCSRF,
    'name'=>FormBuilder::BUNYIPCSRF
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