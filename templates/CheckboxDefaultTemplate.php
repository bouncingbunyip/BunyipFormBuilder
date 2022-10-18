<?php

/**
 * This is the template for the CheckboxFormBuilder.
 * @author Chris Hubbard <chris@ibunyip.com>
 * @package BunyipformBuilder
 * @todo remove the <br> tags
 */

namespace BunyipFormBuilder\templates;

class CheckboxDefaultTemplate
{

    public function getHtml($elem): string
    {
        $html = '<div>'. PHP_EOL;
        $html .= '<label for="'. $elem->getId() .'" '. $elem->getCssClass(). '>'. $elem->getLabel() .'</label><br>'. PHP_EOL;
        $options = $elem->getOptions();
        foreach ($options as $option) {
            if (isset($option['selected']) && $option['selected'] == true) {
                $selected = ' checked';
            } else {
                $selected = '';
            }
            $html .= '<input type="checkbox" name="'. $elem->getName() .'[]" value="'.$option['value'].'"'. $selected .'>'. $option['label'].'<br>'.PHP_EOL;
        }

        if (!empty($elem->getError())) {
            $html .= '<span class="'. $elem->getCssError() .'">'. $elem->getError() .'</span>';
        }
        $html .= '</div>'. PHP_EOL;
        return $html;        
    }
}

