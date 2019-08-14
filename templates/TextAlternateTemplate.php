<?php

/**
 *
 * @author jackal
 *        
 */
namespace FormBuilder;

class TextAlternateTemplate
{

    /**
     */
    function __construct()
    {}
    
    function getHtml(TextFormBuilder $elem) {
        $html = '<label>'. $elem->getLabel(). PHP_EOL;
        $attrs = $elem->getAttributes();
        if ($attrs) {
            $str = ' '. implode(' ', $attrs);
        } else {
            $str = null;
        }
        $html .= '<input type="text" id="'. $elem->getId() .'" name="'. $elem->getName() .'" value="'. $elem->getValue() .'"'. $str .'></label>'.PHP_EOL;
        $error = $elem->getError();
        if (!empty($error)) {
            $html .= '<span class="'. $elem->getCssError() .'">'. $error .'</span>';
        }
        return $html;
    }
}
