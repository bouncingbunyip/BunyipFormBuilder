<?php

/**
 * This is the template for the DateFormBuilder.
 * @author Chris Hubbard <chris@ibunyip.com>
 * @package BunyipformBuilder
 */

namespace BunyipFormBuilder\templates;

class DateDefaultTemplate {

    public function getHtml( $elem): string {
        $html = '<label>' . $elem->getLabel() . '</label>' . PHP_EOL;
        $attrs = $elem->getAttributes();
        if ($attrs) {
            $str = ' ' . implode(' ', $attrs);
        } else {
            $str = null;
        }
        $html .= '<input type="date" id="' . $elem->getId() . '" name="' . $elem->getName() . '" value="' . $elem->getValue() .'"'. $str .'>' . PHP_EOL;
        $error = $elem->getError();
        if (!empty($error)) {
            $html .= '<span class="'. $elem->getCssError() .'">' . $error . '</span>';
        }
        $html .= '<br style="clear:both" />';
        return $html;
    }
}
