<?php

/**
 * This is the template for the SelectFormBuilder.
 * @author Chris Hubbard <chris@ibunyip.com>
 * @package BunyipformBuilder
 */

namespace BunyipFormBuilder\templates\Bootstrap;

class SelectTemplate
{
    public $selected_value;
    /**
     * getHtml
     * <select class="form-select" aria-label="Default select example">
     * <option selected>Open this select menu</option>
     * <option value="1">One</option>
     * <option value="2">Two</option>
     * <option value="3">Three</option>
     * </select>
     * @param $elem
     * @return string
     */
    public function getHtml($elem): string {
        $error = $elem->getError();
        $invalidClass = !empty($error) ? ' is-invalid' : '';

        $html  = '<div class="mb-3">'. PHP_EOL;
        $html .= '    <label for="'. $elem->getId() .'" class="form-label">'. $elem->getLabel() .'</label>'. PHP_EOL;
        $html .= '    <select name="'. $elem->getName() .'" id="'. $elem->getId() .'" class="form-select'. $invalidClass .'" '. $elem->getRequired() .'>'.PHP_EOL;
        $this->selected_value = $elem->getSelected();
        $optGroup = $elem->getOptGroup();
        if ($optGroup) {
            foreach($optGroup as $label=>$options) {
                $html .= '        <optgroup label="'. $label .'">'.PHP_EOL;
                $html .= $this->renderOptions($options);
                $html .= '        </optgroup>'.PHP_EOL;
            }
        } else {
            $options = $elem->getOptions();
            $html .= $this->renderOptions($options);
        }
        $html .= '    </select>'.PHP_EOL;
        if (!empty($error)) {
            $html .= '    <div class="invalid-feedback">'. $error .'</div>'.PHP_EOL;
        }
        $html .= '</div>'. PHP_EOL;
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
