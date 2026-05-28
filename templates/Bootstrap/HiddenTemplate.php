<?php

/**
 * HiddenTemplate.php (Bootstrap)
 *
 * Bootstrap-themed version of HiddenTemplate.
 * Hidden inputs have no visual representation so this is functionally
 * identical to the Basic version, just under the Bootstrap namespace.
 *
 * @package BunyipFormBuilder
 */

namespace BunyipFormBuilder\templates\Bootstrap;

class HiddenTemplate
{
    public function getHtml($elem): string
    {
        return '<input type="hidden" id="' . $elem->getId() . '" name="' . $elem->getName() . '" value="' . $elem->getValue() . '">' . PHP_EOL;
    }
}
