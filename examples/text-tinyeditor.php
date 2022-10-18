<?php

include 'helpers.php';

include '../../../BunyipFormBuilder/BunyipFormBuilder.php';
include '../../../BunyipFormBuilder/ElementFormBuilder.php';
include '../../../BunyipFormBuilder/elements/TextareaTinyEditorFormBuilder.php';
include '../../../BunyipFormBuilder/templates/TextareaTinyEditorTemplate.php';

include '../../../BunyipFormBuilder/elements/SubmitFormBuilder.php';
include '../../../BunyipFormBuilder/templates/SubmitDefaultTemplate.php';

use \FormBuilder\FormBuilder;
use \FormBuilder\TextareaTinyEditorFormBuilder;
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
$form->registerExternal('addons/TinyEditor/tiny.editor.packed.js', 'js');
$form->registerExternal('addons/TinyEditor/style.css', 'css');

/**
 *  id:'input', // (required) ID of the textarea
 *  width:584, // (optional) width of the editor
 *  height:175, // (optional) heightof the editor
 *  cssclass:'te', // (optional) CSS class of the editor
 *  controlclass:'tecontrol', // (optional) CSS class of the buttons
 *  rowclass:'teheader', // (optional) CSS class of the button rows
 *  dividerclass:'tedivider', // (optional) CSS class of the button diviers
 *  controls:['bold', 'italic', 'underline', 'strikethrough', '|', 'subscript', 'superscript', '|', 'orderedlist', 'unorderedlist', '|' ,'outdent' ,'indent', '|', 'leftalign', 'centeralign', 'rightalign', 'blockjustify', '|', 'unformat', '|', 'undo', 'redo', 'n', 'font', 'size', 'style', '|', 'image', 'hr', 'link', 'unlink', '|', 'print'], // (required) options you want available, a '|' represents a divider and an 'n' represents a new row
 *  footer:true, // (optional) show the footer
 *  fonts:['Verdana','Arial','Georgia','Trebuchet MS'],  // (optional) array of fonts to display
 *  xhtml:true, // (optional) generate XHTML vs HTML
 *  cssfile:'style.css', // (optional) attach an external CSS file to the editor
 *  content:'starting content', // (optional) set the starting content else it will default to the textarea content
 *  css:'body{background-color:#ccc}', // (optional) attach CSS to the editor
 *  bodyid:'editor', // (optional) attach an ID to the editor body
 *  footerclass:'tefooter', // (optional) CSS class of the footer
 *  toggle:{text:'source',activetext:'wysiwyg',cssclass:'toggle'}, // (optional) toggle to markup view options
 *  resize:{cssclass:'resize'} // (optional) display options for the editor resize
 */
$options = array(
//    'fieldName' =>'tags',
//    'availableTags' =>"['c++', 'java', 'php']",
//    'autocomplete' =>"{delay: 0, minLength: 2}",
//     'showAutocompleteOnFocus' =>'',
//     'removeConfirmation' =>true,
//     'caseSensitive' =>'',
//     'allowDuplicates' =>'',
//     'allowSpaces' =>'',
//     'readOnly' =>false,
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
    'name'=>'text',
    'value'=>'hello world',
    'options' => $options
);

$form->addElem(new TextareaTinyEditorFormBuilder($attr));

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