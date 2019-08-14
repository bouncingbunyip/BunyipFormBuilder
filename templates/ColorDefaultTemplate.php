<?php

/**
 *
 * @author jackal
 *        
 */
namespace FormBuilder;

class ColorDefaultTemplate
{

    /**
     */
    function __construct()
    {}
    
    function getHtml(ColorFormBuilder $elem) {
        $html = '<label for="'. $elem->getId() .'">'. $elem->getLabel() .'</label>'. PHP_EOL;
        $attrs = $elem->getAttributes();
        if ($attrs) {
            $str = ' '. implode(' ', $attrs);
        } else {
            $str = null;
        }
        $html .= '<input type="color" id="'. $elem->getId() .'" name="'. $elem->getName() .'" value="'. $elem->getValue() .'"'. $str .'>'.PHP_EOL;
        $error = $elem->getError();
        if (!empty($error)) {
            $html .= '<span class="'. $elem->getCssError() .'">'. $error .'</span>';
        }
        if (isset($elem->tooltip)) {
            $html .= $elem->tooltip->render();
        }
        return $html;
    }
}