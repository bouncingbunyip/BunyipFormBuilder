<?php

include 'helpers.php';

include '../../../BunyipFormBuilder/BunyipFormBuilder.php';
include '../../../BunyipFormBuilder/ElementFormBuilder.php';
include '../../../BunyipFormBuilder/elements/TextAutocompleteFormBuilder.php';
include '../../../BunyipFormBuilder/templates/TextAutocompleteDefaultTemplate.php';
include '../../../BunyipFormBuilder/templates/TextAutocompleteDevBridgeTemplate.php';

use \FormBuilder\FormBuilder;
use \FormBuilder\TextAutocompleteFormBuilder;

writeHeader();
$attr = array(
    'name'=>'name'
);
$form = new FormBuilder($attr);
$form->registerExternal('//code.jquery.com/jquery-1.12.4.js', 'js');
$form->registerExternal('addons/jQuery-Autocomplete/dist/jquery.autocomplete.js', 'js');
$elem = new TextAutocompleteFormBuilder($attr);
$elem->setTemplate('TextAutocompleteDevBridgeTemplate');
$form->addElem($elem);

writeCode($form->render());
writeHtml($form->render());
writeFooter();