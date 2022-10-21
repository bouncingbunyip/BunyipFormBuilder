<?php

/**
 *
 * @author jackal
 *        
 */
namespace BunyipFormBuilder;

class TextAutocompleteDevBridgeTemplate
{

    /**
     */
    function __construct()
    {}

    /**
     * getHtml
     * 
     * @param TextAutocompleteFormBuilder $elem
     * @return string HTML for the input field with autocomplete enabled.
     * @see https://github.com/devbridge/jQuery-Autocomplete
     */    
    function getHtml(TextAutocompleteFormBuilder $elem) {
        $label = $elem->getLabel();
        if ($label) {
            $html = '<label for="'. $elem->getId() .'">'. $elem->getLabel() .'</label>'. PHP_EOL;
        } else {
            $html = '';
        }
        
        $attrs = $elem->getAttributes();
        
        if (!empty($attrs['autocomplete'])) {
            $autocomplete = $attrs['autocomplete'];
            unset($attrs['autocomplete']);
        } else {
            $autocomplete = array();
        }
        if ($attrs) {
            $str = ' '. implode(' ', $attrs);
        } else {
            $str = null;
        }
        $html .= '<input type="text" id="'. $elem->getId() .'" name="'. $elem->getName() .'" value="'. $elem->getValue() .'"'. $str .'>'.PHP_EOL;
        
        $error = $elem->getError();
        if (!empty($error)) {
            $html .= '<span class="'. $elem->getCssError() .'">'. $elem->getError() .'</span>';
        }
        if (isset($elem->tooltip)) {
            $html .= $elem->tooltip->render();
        }
//        $html .= '<script type="text/javascript" src="js/jquery.autocomplete.js"></script>'.PHP_EOL;
//    $(function(){
//        $(\'#'.$elem->getId().'\').autocomplete({
//            serviceUrl: \'ajax.php\',
//            onSelect: function(suggestion) {

        $html .= <<<JS
                <script type=\'text/javascript\'>
var countries = [
    { value: 'Andorra', data: 'AD' },
    { value: 'Austria', data: 'AS' },
    { value: 'Australia', data: 'AU' },
    { value: 'Canada', data: 'CA' },
    { value: 'Zimbabwe', data: 'ZZ' }
];

$('#{$elem->getId()}').autocomplete({
    lookup: countries,
    onSelect: function (suggestion) {
        alert('You selected: ' + suggestion.value + ', ' + suggestion.data);
    }
});
JS;
        foreach($autocomplete as $key => $value) {
            $html .= '                $(\'#'.$key.'\').val(suggestion.'.$value.');'.PHP_EOL;
        }
        $html .= '            }
        });
    });
</script>
';
        $html .= '<input type="hidden" id="'. $elem->getId() .'_id" name="'. $elem->getId() .'_id" value="">'.PHP_EOL;
 
        return $html;
    }
}
