<?php

/**
 * TextDeleteSubFormTemplate.php
 *
 * Alternative to TextDeletePostTemplate that avoids nested <form> elements.
 * Uses an inline JS onclick to dynamically create and POST the delete request,
 * so this template is safe to use inside another <form>.
 *
 * @package BunyipFormBuilder
 */

namespace BunyipFormBuilder\templates\Basic;

class TextDeleteSubFormTemplate
{
    function getHtml($elem) {
        $html = '<label for="'. $elem->getId() .'">'. $elem->getLabel() .'</label>' . PHP_EOL;
        $attrs = $elem->getAttributes();
        $str = $attrs ? ' ' . implode(' ', $attrs) : '';
        $html .= '<input type="text" id="'. $elem->getId() .'" name="'. $elem->getName()
               . '" value="'. $elem->getValue() .'"'. $str .'>' . PHP_EOL;

        $action   = htmlspecialchars($elem->getAction());
        $deleteId = (int) $elem->getDeleteId();
        $formName = htmlspecialchars($elem->getFormName());

        // Build onclick using createElement/setAttribute only — no inner quotes needed,
        // so the JS is safe inside a double-quoted HTML attribute.
        $onclick = "var f=document.createElement('form');"
                 . "f.method='POST';"
                 . "f.action='{$action}';"
                 . "var i1=document.createElement('input');i1.name='id';i1.value='{$deleteId}';"
                 . "var i2=document.createElement('input');i2.name='form_name';i2.value='{$formName}';"
                 . "f.appendChild(i1);f.appendChild(i2);"
                 . "document.body.appendChild(f);"
                 . "f.submit();";

        $html .= '<button type="button" style="background:none;border:none;padding:0;cursor:pointer;" onclick="'. $onclick .'">'
               . '<img src="images/icn_round_delete.png" alt="Delete" width="16" height="16">'
               . '</button>' . PHP_EOL;

        if (!empty($elem->getError())) {
            $html .= '<span class="'. $elem->getCssError() .'">'. $elem->getError() .'</span>';
        }
        return $html;
    }
}
