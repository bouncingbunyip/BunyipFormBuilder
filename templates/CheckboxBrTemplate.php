<?php

/**
 * This is the template for the CheckboxFormBuilder.
 * @author Chris Hubbard <chris@ibunyip.com>
 * @package BunyipformBuilder
 */

namespace BunyipFormBuilder\templates;

class CheckboxBrTemplate
{
    
    public function getHtml($elem) {
        $html = '<label for="'. $elem->getId() .'">'. $elem->getLabel() .'</label>'. PHP_EOL;
        $options = $elem->getOptions();
        foreach ($options as $option) {
            if (isset($option['selected']) && $option['selected'] == true) {
                $selected = ' checked';
            } else {
                $selected = '';
            }
            $html .= '<label '. $elem->getCssClass(). '><input type="checkbox" name="'. $elem->getName() .'[]" value="'.$option['value'].'"'. $selected .' />'. $option['label'].'</label><br style="clear:both" />'.PHP_EOL;
        }

        if (!empty($elem->getError())) {
            $html .= '<span class="'. $elem->getCssError() .'">'. $elem->getError() .'</span>';
        }
        return $html;        
    }
}