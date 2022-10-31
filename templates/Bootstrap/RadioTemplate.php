<?php

/**
 * This is the Bootstrap themed template for the RadioFormBuilder.
 * @author Chris Hubbard <chris@ibunyip.com>
 * @package BunyipformBuilder
 */


namespace BunyipFormBuilder\templates\Bootstrap;

class RadioTemplate
{

    /**
     * getHtml
     * @see https://getbootstrap.com/docs/5.2/forms/overview/
     * <div class="form-check">
     * <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
     * <label class="form-check-label" for="flexRadioDefault1">
     * Default radio
     * </label>
     * </div>
     * <div class="form-check">
     * <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
     * <label class="form-check-label" for="flexRadioDefault2">
     * Default checked radio
     * </label>
     * </div>
     */
    public function getHtml($elem): string {
        $this->selected_value = $elem->getSelected();
        $html = '';
        $options = $elem->getOptions();
        if ($options) {
            $counter = 0;
            foreach ($options as $option) {
                if ($this->selected_value && ($this->selected_value == $option['value'])) {
                    $selected = ' checked';
                } elseif (isset($option['selected']) && $option['selected'] == true) {
                    $selected = ' checked';
                } else {
                    $selected = '';
                }
                $html .= '<div class="form-check">'.PHP_EOL;
                $html .= '        <input class="form-check-input" id="' . $elem->getName() . '-' . $counter . '" type="radio" name="' . $elem->getName() . '" value="' . $option['value'] . '"' . $selected . '> '. PHP_EOL;
                $html .= '        <label class="form-check-label" for="' . $elem->getName() . '-' . $counter . '">' . PHP_EOL;
                $html .= '        ' . $option['label'] . PHP_EOL;
                $html .= '        </label>' . PHP_EOL;
                $html .= '</div>' . PHP_EOL;
                $counter++;
            }
        }


//        $label = $elem->getLabel();
//        $html .= '<input type="text" id="'. $elem->getId() .'" name="'. $elem->getName() .'" value="'. $elem->getValue() .'"'. $str .'>'.PHP_EOL;
//        if ($label) {
//            $html .= '<label class="form-label" for="'. $elem->getId() .'">'. $elem->getLabel() .'</label>'. PHP_EOL;
//        }
//        $html .= '</div>';
//
//        $attrs = $elem->getAttributes();
//        if ($attrs) {
//            $str = ' '. implode(' ', $attrs);
//        } else {
//            $str = null;
//        }
//        $html .= '    <input type="text" id="'. $elem->getId() .'" name="'. $elem->getName() .'" value="'. $elem->getValue() .'"'. $str .'>'.PHP_EOL;

        $error = $elem->getError();
        if (!empty($error)) {
            $html .= '<div class="invalid-feedback">
        '. $elem->getError() .'
      </div>';
        }
        if (isset($elem->tooltip)) {
            $html .= $elem->tooltip->render();
        }        
        return $html;
    }
}