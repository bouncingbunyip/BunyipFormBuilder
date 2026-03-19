<?php

namespace BunyipFormBuilder\templates\Bootstrap;

use BunyipFormBuilder\elements\TelFormBuilder;

class TelTemplate
{
    public function getHtml(TelFormBuilder $elem)
    {
        $html = '<div class="mb-3">' . PHP_EOL;
        $html .= '    <label for="' . $elem->getId() . '" class="form-label">' . $elem->getLabel() . '</label>' . PHP_EOL;
        $css = $elem->getCssClass();
        if ($css) {
            $class = ' ' . $css;
        } else {
            $class = ' class="form-control"';
        }
        $required = $elem->getRequired();
        $placeholder = $elem->getPlaceholder();
        $autofocus = $elem->getAutofocus();
        $attrs = '';
        if ($required) $attrs .= ' ' . $required;
        if ($placeholder) $attrs .= ' ' . $placeholder;
        if ($autofocus) $attrs .= ' ' . $autofocus;
        $html .= '    <input type="tel" id="' . $elem->getId() . '" name="' . $elem->getName() . '"' . $class . ' value="' . $elem->getValue() . '"' . $attrs . '>' . PHP_EOL;
        $error = $elem->getError();
        if (!empty($error)) {
            $html .= '    <div class="invalid-feedback d-block">' . $error . '</div>' . PHP_EOL;
        }
        $html .= '</div>' . PHP_EOL;
        return $html;
    }
}
