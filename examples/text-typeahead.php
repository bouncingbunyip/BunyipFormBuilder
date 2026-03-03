<?php

require_once '../Autoloader.php';
use BunyipFormBuilder\FormBuilder;
use BunyipFormBuilder\elements\TextTypeaheadFormBuilder;

include 'helpers.php';

writeHeader();
$attr = array(
    'label'=>'Name',
    'id'=>'name-id',
    'name'=>'name',
    'method'=>'post'
);

$form = new FormBuilder($attr);
$form->registerExternal('//code.jquery.com/jquery-3.7.1.min.js', 'js');
$form->registerExternal('//cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js', 'js');

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