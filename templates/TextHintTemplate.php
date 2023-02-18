<?php

/**
 *
 * @author Chris Hubbard <chris@ibunyip.com>
 *        
 */
namespace BunyipFormBuilder\templates;

class TextHintTemplate
{

    /**
     * for more info on hint: http://kushagragour.in/lab/hint/
     */
    function getHtml( $elem) {
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
            $html .= '<span class="'. $elem->getCssError() .'">'. $elem->getError() .'</span>';
        }
        $html .= $elem->tooltip->render();
        return $html;
    }
}
