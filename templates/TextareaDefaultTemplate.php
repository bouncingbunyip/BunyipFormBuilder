<?php

/**
 * This is the template for the TextareaFormBuilder.
 * @author Chris Hubbard <chris@ibunyip.com>
 * @package BunyipformBuilder
 */

namespace BunyipFormBuilder\templates;

class TextareaDefaultTemplate
{

    public function getHtml( $elem) {
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
