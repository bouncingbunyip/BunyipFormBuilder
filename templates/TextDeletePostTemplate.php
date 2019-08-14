<?php

/**
 *
 * @author jackal
 *        
 */
namespace FormBuilder;

class TextDeletePostTemplate
{

    /**
     */
    function __construct()
    {}
    
    function getHtml(TextDeleteFormBuilder $elem) {
        $html = '<label for="'. $elem->getId() .'">'. $elem->getLabel() .'</label>'. PHP_EOL;
        $attrs = $elem->getAttributes();
        if ($attrs) {
            $str = ' '. implode(' ', $attrs);
        } else {
            $str = null;
        }
        $html .= '<input type="text" id="'. $elem->getId() .'" name="'. $elem->getName() .'" value="'. $elem->getValue() .'"'. $str .'>'.PHP_EOL;
        $html .= '<form action="'. $elem->getAction() .'" method="'. $elem->getMethod() .'">';
        $html .= '<input type="hidden" name="id" value="'. $elem->getDeleteId() .'">';
        $html .= '<input type="image" src="images/icn_round_delete.png" alt="Submit" width="16" height="16">';
        $html .= '</form>';
        
        if (!empty($elem->getError())) {
            $html .= '<span class="'. $elem->getCssError() .'">'. $elem->getError() .'</span>';
        }
        return $html;
    }
}
