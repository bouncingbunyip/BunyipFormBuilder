<?php

include 'helpers.php';

include '../../../BunyipFormBuilder/BunyipFormBuilder.php';
include '../../../BunyipFormBuilder/ElementFormBuilder.php';
include '../../../BunyipFormBuilder/elements/TextTypeaheadFormBuilder.php';
include '../../../BunyipFormBuilder/templates/TextTypeaheadDefaultTemplate.php';

use \FormBuilder\FormBuilder;
use \FormBuilder\TextTypeaheadFormBuilder;

writeHeader();
$attr = array(
    'label'=>'Name',
    'id'=>'name-id',
    'name'=>'name',
    'method'=>'post'
);

$form = new FormBuilder($attr);
$form->registerExternal('//code.jquery.com/jquery-1.10.2.js', 'js');
$form->registerExternal('//code.jquery.com/ui/1.11.4/jquery-ui.js', 'js');
$form->registerExternal('addons/typeahead/typeahead.js', 'js');
$form->registerExternal('addons/typeahead/typeahead.css', 'css');

/**
 * fieldName (String) becomes the input 'name'
 * availableTags (Array) Used as source for the autocompletion, unless autocomplete.source is overridden
 * autocomplete (Object)
 * showAutocompleteOnFocus (boolean) default false
 * removeConfirmation (boolean) default false
 * caseSensitive (boolean) default true
 * allowDuplicates (boolean) default false
 * allowSpaces (boolean) default false
 * readOnly (boolean) default false
 * tagLimit (integer) default null
 * singleField (boolean) default false unless using and <input> tag in which case overridden as true
 * singleFieldDelimiter (String) defaults to ","
 * singleFieldNode (DomNode)
 * tabIndex (integer) defaults null
 * placeholderText (String) defaults null
 */
$options = array(
    'fieldName' =>'tags',
    'availableTags' =>"['c++', 'java', 'php']",
    'autocomplete' =>"{delay: 0, minLength: 2}",
//     'showAutocompleteOnFocus' =>'',
     'removeConfirmation' =>true,
//     'caseSensitive' =>'',
//     'allowDuplicates' =>'',
//     'allowSpaces' =>'',
     'readOnly' =>false,
//     'tagLimit' =>'',
//     'singleField' =>true,
//     'singleFieldDelimiter' =>'',
//     'singleFieldNode' =>'',
//     'tabIndex' =>'',
//     'placeholderText' =>''    
);

$attr = array(
    'label'=>'Name',
    'id'=>'tags',
    'name'=>'tags',
    'value'=>'hello world',
    'options' => $options
);

$form->addElem(new TextTypeaheadFormBuilder($attr));

writeCode($form->render());
writeHtml($form->render());
writeFooter();


?>