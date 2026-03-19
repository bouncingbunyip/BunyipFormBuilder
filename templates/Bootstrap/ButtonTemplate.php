<?php

/**
 * This is the template for the Bootstrap version of ButtonFormBuilder.
 * @author Chris Hubbard <chris@ibunyip.com>
 * @package BunyipformBuilder
 */

namespace BunyipFormBuilder\templates\Bootstrap;

/**
 * <button type="button" class="btn">Base class</button>
 * <button type="button" class="btn btn-primary">Primary</button>
 * <button class="btn btn-primary" type="submit">Button</button>
 * <button type="button" class="btn btn-outline-primary">Primary</button>
 */
class ButtonTemplate
{
    public function getHtml($elem): string
    {
        $class   = !empty($elem->getCssClass()) ? $elem->getCssClass() : 'class="btn"';
        $label   = !empty($elem->getName()) ? $elem->getName() : 'submit';
        $onclick = $elem->getOnClick() ? ' onclick="' . $elem->getOnClick() . '"' : '';
        $attrs   = $elem->getAttributes() ? ' ' . implode(' ', $elem->getAttributes()) : '';

        $html = '<button type="' . $elem->getType() . '" ' . $class . $onclick . $attrs . '>'
              . $label
              . '</button>' . PHP_EOL;
        return $html;
    }
}
