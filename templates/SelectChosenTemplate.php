<?php

/**
 * This is the template for the SelectChosenFormBuilder.
 * @author Chris Hubbard <chris@ibunyip.com>
 * @deprecated
 * @package BunyipformBuilder
 */

namespace BunyipFormBuilder\templates;

class SelectChosenTemplate
{

    /**
     * Chosen: https://harvesthq.github.io/chosen/
     *  <select data-placeholder="Choose a country..." multiple class="chosen-select">
     * @todo Replace Chosen (which is deprecated) with something like https://selectize.dev/docs.html
     * @param SelectChosenFormBuilder $elem
     * @return string
     */
    public function getHtml( $elem) {
        $html = '<label for="'. $elem->getId() .'">'. $elem->getLabel() .'</label>'. PHP_EOL;
        $placeholder = $elem->getPlaceholder();

        $class = $elem->getClass();

        $html .= '<select data-placeholder="'. $placeholder .'" multiple id="chzn-select" name="'. $elem->getName() .'" '. $elem->getRequired() .' class="'. $class .'">'.PHP_EOL;
        $optGroup = $elem->getOptGroup();
        if ($optGroup) {
            foreach($optGroup as $label=>$options) {
                $html .= '    <optgroup label="'. $label .'">'.PHP_EOL;
                $html .= $this->renderOptions($options);
                $html .= '    </optgroup>'.PHP_EOL;
            }
        } else {
            $options = $elem->getOptions();
            $html .= $this->renderOptions($options);
        }
        
        $html .= '</select>'.PHP_EOL;
        $error = $elem->getError();
        if (!empty($error)) {
            $html .= '<span class="'. $elem->getCssError() .'">'. $error .'</span>'.PHP_EOL;
        }
        $opts = $elem->getChosenOptions();
        if(is_null($opts)) {
            $chosenOptions = '';
        } else {
            $chosenOptions = '{';
            foreach ($opts as $key=>$value) {
                $temp[] = '"'.$key .'": "'. $value .'"';
            }
            $chosenOptions .= implode(', ', $temp) . '}';
        }

        $html .= '<script>'
                . '$(".'.$class.'").chosen('.$chosenOptions.')'
                . '</script>';
        return $html;        
    }
    
    public function renderOptions($options) {
        $retval = '';
        foreach ($options as $option) {
            if (isset($option['selected']) && $option['selected'] == true) {
                $selected = ' selected';
            } else {
                $selected = '';
            }
            $retval .=  '    <option value="'. $option['value'] .'"'. $selected.'>'. $option['label'] .'</option>'.PHP_EOL;
        }
        return $retval;
    }
}
