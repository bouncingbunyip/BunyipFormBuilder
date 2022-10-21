<?php

/**
 * This is the template for the ResetFormBuilder.
 * @author Chris Hubbard <chris@ibunyip.com>
 * @package BunyipformBuilder
 */

namespace BunyipFormBuilder\templates;

class ResetDefaultTemplate
{

    public function getHtml($elem) {
        $css = $elem->getCssClass();
        if (!empty($css)) {
            $class = ' '. $elem->getCssClass();
        } else {
            $class = '';
        }

        $html = '<input type="reset"'. $class .'>'.PHP_EOL;
        return $html;
    }
}
