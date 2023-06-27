<?php

/**
 * This is the template for the TextFormBuilder.
 * @author Chris Hubbard <chris@ibunyip.com>
 * @package BunyipformBuilder
 */

namespace BunyipFormBuilder\templates;

class TextDefaultTemplate
{

    /**
     * getHtml
     * @todo The tooltip probably needs to be repositioned.
     */
    function getHtml($elem): string
    {
        $label = $elem->getLabel();
        if ($label) {
			$class = $elem->getLabelClass();
			if ($class) {
				$class_html = ' class="'.$class.'"';
			} else {
				$class_html = ' ';
			}
            $html = '<label'. $class_html .' for="'. $elem->getId() .'">'. $elem->getLabel() .'</label>'. PHP_EOL;
        } else {
            $html = '';
        }
        $attrs = $elem->getAttributes();
        if ($attrs) {
            $str = ' '. implode(' ', $attrs);
        } else {
            $str = null;
        }
        $html .= '<input type="text" id="'. $elem->getId() .'" name="'. $elem->getName() .'" value="'. $elem->getValue() .'"'. $str .'>'.PHP_EOL;

        if (!empty($elem->decorator)) {
            $html .= $elem->decorator->render();
        }

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