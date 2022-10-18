<?php

/**
 * This is the template for the HiddenCsrfFormBuilder.
 * @author Chris Hubbard <chris@ibunyip.com>
 * @package BunyipformBuilder
 */

namespace BunyipFormBuilder\templates;

class HiddenCsrfDefaultTemplate
{
    
    public function getHtml($elem): string
    {
        $html = '<input type="hidden" id="'. $elem->getId() .'" name="'. $elem->getName() .'" value="'. $elem->getValue() .'">'.PHP_EOL;
        return $html;
    }
}
