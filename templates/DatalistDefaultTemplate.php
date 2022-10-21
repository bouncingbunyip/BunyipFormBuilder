<?php

/**
 * This is the template for the DatalistFormBuilder.
 * @author Chris Hubbard <chris@ibunyip.com>
 * @package BunyipformBuilder
 */

namespace BunyipFormBuilder\templates;

class DatalistDefaultTemplate
{

    /**
     * <label for="browser">Choose your browser from the list:</label>
     * <input list="browsers" name="browser" id="browser">
     * <datalist id="browsers">
     *   <option value="Edge">
     *   <option value="Firefox">
     *   <option value="Chrome">
     *   <option value="Opera">
     *   <option value="Safari">
     * </datalist>
     * @param $elem
     * @return string
     */
    public function getHtml($elem): string {
        $html = '<label for="'. $elem->getId() .'">'. $elem->getLabel() .'</label>'. PHP_EOL;
        $class = $elem->getCssClass();
        $html .= '<input list="'. $elem->getList() .'" name="'. $elem->getName() .'" '. $elem->getRequired() . $class .'>'.PHP_EOL;
        $html .= '<datalist id="'. $elem->getList() .'">'.PHP_EOL;
        $options = $elem->getOptions();
        $html .= $this->renderOptions($options);

        
        $html .= '</datalist>'.PHP_EOL;
        $error = $elem->getError();
        if (!empty($error)) {
            $html .= '<span class="'. $elem->getCssError() .'">'. $error .'</span>'.PHP_EOL;
        }
        return $html;        
    }
    
    public function renderOptions($options): string {
        $retval = '';
        foreach ($options as $option) {

            $retval .=  '    <option value="'. $option['value'] .'">'.PHP_EOL;
        }
        return $retval;
    }
}
