<?php

/**
 * This is the template for the NumberFormBuilder.
 * @author Chris Hubbard <chris@ibunyip.com>
 * @package BunyipformBuilder
 */

namespace BunyipFormBuilder\templates;

class NumberDefaultTemplate
{

    public function getHtml( $elem) {
        $html = '<label for="'. $elem->getId() .'">'. $elem->getLabel() .'</label>'. PHP_EOL;
        $attrs = $elem->getAttributes();
        if ($attrs) {
            $str = ' '. implode(' ', $attrs);
        } else {
            $str = null;
        }
        $html .= '<input type="number" id="'. $elem->getId() .'" name="'. $elem->getName() .'" value="'. $elem->getValue() .'" min="'. $elem->getMin() .'" max="'. $elem->getMax() .'"'. $str .'>'.PHP_EOL;
        
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
