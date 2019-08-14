<?php

/**
 *
 * @author jackal
 *        
 */
namespace FormBuilder;

class TextOpentipTemplate
{

    /**
     */
    function __construct()
    {}
    
    /**
     * for more info on opentip: http://www.opentip.org/index.html
     */
    function getHtml(TextFormBuilder $elem) {
        $html = '<label>'. $elem->getLabel() .'</label>'. PHP_EOL;
        $attrs = $elem->getAttributes();
        if ($attrs) {
            $str = ' '. implode(' ', $attrs);
        } else {
            $str = null;
        }
        $html .= '<input type="text" id="'. $elem->getId() .'" name="'. $elem->getName() .'" value="'. $elem->getValue() .'"'. $str .'>'.PHP_EOL;
        $error = $elem->getError();
        if (!empty($error)) {
            $html .= '<span class="'. $elem->getCssError() .'">'. $error .'</span>';
        }
        $html .= $elem->tooltip->render();
        
        return $html;
    }
}
