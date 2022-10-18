<?php

/**
 * This is the template for the FileFormBuilder.
 * @author Chris Hubbard <chris@ibunyip.com>
 * @package BunyipformBuilder
 */

namespace BunyipFormBuilder\templates;

class FileDefaultTemplate
{

    public function getHtml($elem) {
        $label = $elem->getLabel();
        if ($label) {
            $html = '<label for="'. $elem->getId() .'">'. $elem->getLabel() .'</label>'. PHP_EOL;
        } else {
            $html = '';
        }
        
        $attrs = $elem->getAttributes();
        if ($attrs) {
            $str = ' '. implode(' ', $attrs);
        } else {
            $str = null;
        }
        $html .= '<input type="file" id="'. $elem->getId() .'" name="'. $elem->getName() .'" value="'. $elem->getValue() .'"'. $str .'>'.PHP_EOL;
        
        $error = $elem->getError();
        if (!empty($error)) {
            $html .= '<span class="'. $elem->getCssError() .'">'. $elem->getError() .'</span>';
        }
        if (isset($elem->tooltip)) {
            $html .= $elem->tooltip->render();
        }
        return $html;
    }
}
