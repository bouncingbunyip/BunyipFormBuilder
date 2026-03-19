<?php
require_once '../vendor/autoload.php';
use BunyipFormBuilder\FormBuilder;
use BunyipFormBuilder\elements\ButtonFormBuilder;
include 'helpers.php';


writeHeader();

$attr = array(
    'value'=>'Name',
    'id'=>'name-id',
    'name'=>'name',
    'theme' => 'Bootstrap',
);
$expect = '<button type="button" class="btn">name</button>
';
$form = new ButtonFormBuilder($attr);
writeCode($form->render());
writeHtml($form->render());
writeExpect($expect, $form->render());

$attr = array(
    'id'=>'name-id',
    'name'=>'name',
    'value'=>'Big Bob',
    'class'=>'btn btn-primary',
    'theme' => 'Bootstrap',
);
$expect = '<button type="button" class="btn btn-primary">name</button>
';
$form = new ButtonFormBuilder($attr);
writeCode($form->render());
writeHtml($form->render());
writeExpect($expect, $form->render());

$attr = array(
    'id'=>'name-id',
    'name'=>'Button',
    'value'=>'Big Bob',
    'type'=>'submit',
    'class'=>'btn btn-outline-primary',
    'theme' => 'Bootstrap',
);
$expect = '<button type="submit" class="btn btn-outline-primary">Button</button>
';
$form = new ButtonFormBuilder($attr);
writeCode($form->render());
writeHtml($form->render());
writeExpect($expect, $form->render());

// disabled button
$attr = array(
    'id'=>'disabled-id',
    'name'=>'Disabled',
    'class'=>'btn btn-primary',
    'attributes'=> ['disabled'],
    'theme' => 'Bootstrap',
);
$expect = '<button type="button" class="btn btn-primary" disabled>Disabled</button>
';
$form = new ButtonFormBuilder($attr);
writeCode($form->render());
writeHtml($form->render());
writeExpect($expect, $form->render());
writeFooter();


// <button type="button" class="btn btn-outline-primary">Primary</button>