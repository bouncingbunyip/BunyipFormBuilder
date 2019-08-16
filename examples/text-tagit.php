<?php

include 'helpers.php';

include '../../../FormBuilder/FormBuilder.php';
include '../../../FormBuilder/ElementFormBuilder.php';
include '../../../FormBuilder/elements/TextTagItFormBuilder.php';
include '../../../FormBuilder/templates/TextTagItTemplate.php';

include '../../../FormBuilder/elements/SubmitFormBuilder.php';
include '../../../FormBuilder/templates/SubmitDefaultTemplate.php';

use \FormBuilder\FormBuilder;
use \FormBuilder\TextTagItFormBuilder;
use \FormBuilder\SubmitFormBuilder;

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
$form->registerExternal('addons/tag-it/js/tag-it.js', 'js');
$form->registerExternal('addons/tag-it/css/jquery.tagit.css', 'css');
$form->registerExternal('addons/tag-it/css/tagit.ui-zendesk.css', 'css');



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

$form->addElem(new TextTagItFormBuilder($attr));

$attr = array(
    'value'=>'Submit',
    'id'=>'submit',
    'name'=>'submit'
);
$form->addElem(new SubmitFormBuilder($attr));

//$form->setFieldset($fieldset);

writeCode($form->render());
writeHtml($form->render());
writeFooter();


?>