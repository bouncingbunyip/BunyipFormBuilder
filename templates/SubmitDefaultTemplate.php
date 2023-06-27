<?php

/**
 * This is the template for the SubmitFormBuilder.
 * @author Chris Hubbard <chris@ibunyip.com>
 * @package BunyipformBuilder
 */

namespace BunyipFormBuilder\templates;

class SubmitDefaultTemplate
{

    public function getHtml($elem) {
        $css = $elem->getCssClass('class');
        if (!empty($css)) {
            $class = ' '. $elem->getCssClass('class');
        } else {
            $class = '';
        }
        $name = $elem->getName();
        if (!empty($name)) {
            $name = $elem->getName();
        } else {
            $name = 'submit';
        }
        $html = '<input type="submit" name="'. $name .'" value="'. $elem->getValue() .'"'. $class .'>'.PHP_EOL;
        return $html;
    }
}
