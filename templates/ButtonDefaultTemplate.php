<?php

/**
 * This is the template for the ButtonFormBuilder.
 * @author Chris Hubbard <chris@ibunyip.com>
 * @package BunyipformBuilder
 */

namespace BunyipFormBuilder\templates;

class ButtonDefaultTemplate
{
    public function getHtml($elem): string
    {
        if (!empty($elem->getCssClass())) {
            $class = ' '.$elem->getCssClass();
        } else {
            $class = '';
        }
        if (!empty($elem->getName())) {
            $name = $elem->getName();
        } else {
            $name = 'submit';
        }
        if (!empty($elem->getOnClick())) {
            $onclick = ' onclick="'.$elem->getOnClick() .'"';
        } else {
            $onclick = '';
        }
        $html = '<input type="button" id="'. $elem->getId() .'" name="'. $name .'" value="'. $elem->getValue() .'"'. $class . $onclick.'>'.PHP_EOL;
        return $html;
    }
}
