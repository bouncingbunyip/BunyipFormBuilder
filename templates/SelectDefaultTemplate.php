<?php

/**
 * This is the template for the SelectFormBuilder.
 * @author Chris Hubbard <chris@ibunyip.com>
 * @package BunyipformBuilder
 */

namespace BunyipFormBuilder\templates;

class SelectDefaultTemplate
{

	public $selected_value;
	
    /**
     * 
     * @param $elem
     * @return string
     */
    public function getHtml($elem): string {
        $html = '<label for="'. $elem->getId() .'">'. $elem->getLabel() .'</label>'. PHP_EOL;
        $class = $elem->getCssClass();
        $html .= '<select name="'. $elem->getName() .'" '. $elem->getRequired() . $class .'>'.PHP_EOL;
        $this->selected_value = $elem->getSelected();
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
        return $html;        
    }
    
    public function renderOptions($options): string {
        $retval = '';
        foreach ($options as $option) {
            if ($this->selected_value && ($this->selected_value == $option['value'])) {
                $selected = ' selected';
            } elseif (isset($option['selected']) && $option['selected'] == true) {
                $selected = ' selected';
            } else {
                $selected = '';
            }
            if (isset($option['disabled']) && $option['disabled'] === true) {
                $disabled = ' disabled';
            } else {
                $disabled = '';
            }
            $retval .=  '    <option value="'. $option['value'] .'"'. $selected . $disabled.'>'. $option['label'] .'</option>'.PHP_EOL;
        }
        return $retval;
    }
}
