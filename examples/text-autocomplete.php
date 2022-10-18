<?php

require_once '../Autoloader.php';
use BunyipFormBuilder\Formbuilder;
use BunyipFormBuilder\elements\TextAutocompleteFormbuilder;
include 'helpers.php';

writeHeader();

$attr = array(
    'name'=>'form-name'
);
$form = new FormBuilder($attr);
$form->registerExternal('//code.jquery.com/jquery-1.12.4.js', 'js');
$form->registerExternal('//code.jquery.com/ui/1.12.1/jquery-ui.js', 'js');

$name = 'tags';

$source = '$( function() {
    var availableTags = [
      "ActionScript",
      "AppleScript",
      "Asp",
      "BASIC",
      "C",
      "C++",
      "Clojure",
      "COBOL",
      "ColdFusion",
      "Erlang",
      "Fortran",
      "Groovy",
      "Haskell",
      "Java",
      "JavaScript",
      "Lisp",
      "Perl",
      "PHP",
      "Python",
      "Ruby",
      "Scala",
      "Scheme"
    ];
    $( "#'. $name .'" ).autocomplete({
      source: availableTags
    });
  } );';
$attr = array(
    'name'=>$name,
    'source'=>$source
);
$form->addElem(new TextAutocompleteFormBuilder($attr));

writeCode($form->render());
writeHtml($form->render());
writeFooter();
