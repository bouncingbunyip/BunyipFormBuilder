<?php

namespace BunyipFormBuilder\templates\Bootstrap;

use BunyipFormBuilder\elements\FileFormBuilder;

class FileTemplate
{
    public function getHtml(FileFormBuilder $elem)
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
        $attrs = '';
        if ($required) $attrs .= ' ' . $required;
        $html .= '    <input type="file" id="' . $elem->getId() . '" name="' . $elem->getName() . '"' . $class . $attrs . '>' . PHP_EOL;
        $error = $elem->getError();
        if (!empty($error)) {
            $html .= '    <div class="invalid-feedback d-block">' . $error . '</div>' . PHP_EOL;
        }
        $html .= '</div>' . PHP_EOL;
        return $html;
    }
}
