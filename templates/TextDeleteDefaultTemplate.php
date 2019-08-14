<?php

/**
 *
 * @author jackal
 *        
 */
namespace FormBuilder;

class TextDeleteDefaultTemplate
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
        $html .= '<a href="index.php?p=delete_email&id=' . $elem->getId() . '"><img src="images/icn_round_delete.png" class="icn_with_input"></a>' . PHP_EOL;
        
        if (!empty($elem->getError())) {
            $html .= '<span class="'. $elem->getCssError() .'">'. $elem->getError() .'</span>';
        }
        return $html;
    }
}
