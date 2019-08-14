<?php

/**
 *
 * @author jackal
 *        
 */
namespace FormBuilder;

class TextareaDefaultTemplate
{

    /**
     */
    function __construct()
    {}
    
    function getHtml(TextareaFormBuilder $elem) {
        $html = '<label for="'. $elem->getId() .'">'. $elem->getLabel() .'</label>'. PHP_EOL;
        $attrs = $elem->getAttributes();
        if ($attrs) {
            $str = ' '. implode(' ', $attrs);
        } else {
            $str = null;
        }
        $html .= '<textarea id="'. $elem->getId() .'" name="'. $elem->getName() .'"'. $str .'>'. $elem->getValue() .'</textarea>'.PHP_EOL; 
        $error = $elem->getError();
        if (!empty($error)) {
            $html .= '    <span class="'. $elem->getCssError() .'">'. $error .'</span>'.PHP_EOL;
        }
        return $html;
    }
}
