<?php

include 'helpers.php';

include '../../../BunyipFormBuilder/BunyipFormBuilder.php';
include '../../../BunyipFormBuilder/ElementFormBuilder.php';
include '../../../BunyipFormBuilder/elements/TextAutocompleteFormBuilder.php';
include '../../../BunyipFormBuilder/templates/TextAutocompleteDefaultTemplate.php';

use \FormBuilder\FormBuilder;
use \FormBuilder\TextAutocompleteFormBuilder;

writeHeader();

$attr = array(
    'name'=>'form-name'
);
$form = new FormBuilder($attr);
$form->registerExternal('//code.jquery.com/jquery-1.12.4.js', 'js');
$form->registerExternal('//code.jquery.com/ui/1.12.1/jquery-ui.js', 'js');

$name = 'tags';

$source = '
    $( "'. $name .'" ).autocomplete({
      source: "http://sites.local/packages/BunyipFormBuilder/test/examples/addons/search.php",
      minLength: 1,
    });';

//$source = 'function( request, response ) {
//        $.ajax({
//          url: "http://sites.local/packages/FormBuilder/test/examples/addons/search.php",
//          dataType: "jsonp",
//          data: {
//            q: request.term
//          },
//          success: function( data ) {
//            response( data );
//          }
//        });
//      }';


$attr = array(
    'name'=>$name,
    'source'=>$source
);
$form->addElem(new TextAutocompleteFormBuilder($attr));

writeCode($form->render());
writeHtml($form->render());
writeFooter();


?>