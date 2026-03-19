<?php

/**
 *
 * @author Chris Hubbard <chris@ibunyip.com>
 *
 */
namespace BunyipFormBuilder\templates\Basic;

class TextTypeaheadTemplate
{

    /**
     */
    function __construct()
    {}

//    function getHtml(TextTypeaheadFormBuilder $elem) {
//        $label = $elem->getLabel();
//        if ($label) {
//            $html = '<label for="'. $elem->getId() .'">'. $elem->getLabel() .'</label>'. PHP_EOL;
//        } else {
//            $html = '';
//        }
//
//        $attrs = $elem->getAttributes();
//        if ($attrs) {
//            $str = ' '. implode(' ', $attrs);
//        } else {
//            $str = null;
//        }
//        $html .= '<input type="text" id="'. $elem->getId() .'" name="'. $elem->getName() .'" value="'. $elem->getValue() .'"'. $str .'>'.PHP_EOL;
//
//        $error = $elem->getError();
//        if (!empty($error)) {
//            $html .= '<span class="'. $elem->getCssError() .'">'. $elem->getError() .'</span>';
//        }
//        if (isset($elem->tooltip)) {
//            $html .= $elem->tooltip->render();
//        }
//        return $html;
//    }

    public function getHtml($elem) {
        $id    = $elem->getId();
        $label = $elem->getLabel();
        $name  = $elem->getName();

        $html = <<<HTML
<div id="typeahead-{$id}">
  <label for="{$id}">{$label}</label>
  <input class="typeahead" id="{$id}" name="{$name}" type="text" placeholder="States of USA">
</div>

<script>
var substringMatcher = function(strs) {
  return function findMatches(q, cb) {
    var matches = [];
    var substrRegex = new RegExp(q, 'i');
    $.each(strs, function(i, str) {
      if (substrRegex.test(str)) {
        matches.push(str);
      }
    });
    cb(matches);
  };
};

var states = ['Alabama', 'Alaska', 'Arizona', 'Arkansas', 'California',
  'Colorado', 'Connecticut', 'Delaware', 'Florida', 'Georgia', 'Hawaii',
  'Idaho', 'Illinois', 'Indiana', 'Iowa', 'Kansas', 'Kentucky', 'Louisiana',
  'Maine', 'Maryland', 'Massachusetts', 'Michigan', 'Minnesota',
  'Mississippi', 'Missouri', 'Montana', 'Nebraska', 'Nevada', 'New Hampshire',
  'New Jersey', 'New Mexico', 'New York', 'North Carolina', 'North Dakota',
  'Ohio', 'Oklahoma', 'Oregon', 'Pennsylvania', 'Rhode Island',
  'South Carolina', 'South Dakota', 'Tennessee', 'Texas', 'Utah', 'Vermont',
  'Virginia', 'Washington', 'West Virginia', 'Wisconsin', 'Wyoming'
];

$('#typeahead-{$id} .typeahead').typeahead({
  hint: true,
  highlight: true,
  minLength: 1
},
{
  name: '{$id}',
  source: substringMatcher(states)
});
</script>
HTML;
        return $html;
    }
}
