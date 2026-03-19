<?php

/**
 * This is the template for the HiddenFormBuilder.
 * @author Chris Hubbard <chris@ibunyip.com>
 * @package BunyipformBuilder
 */

namespace BunyipFormBuilder\templates\Basic;

class HiddenTemplate
{

    public function getHtml($elem) {
        $html = '<input type="hidden" id="'. $elem->getId() .'" name="'. $elem->getName() .'" value="'. $elem->getValue() .'">'.PHP_EOL;
        return $html;
    }
}
