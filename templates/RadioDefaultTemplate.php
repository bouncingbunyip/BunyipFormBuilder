<?php

/**
 *
 * @author jackal
 *        
 */
namespace FormBuilder;

class RadioDefaultTemplate
{

    /**
     */
    function __construct()
    {}
    
    function getHtml(RadioFormBuilder $elem) {
        $html = '<label for="'. $elem->getId() .'">'. $elem->getLabel() .'</label>'. PHP_EOL;
        $selected_value = $elem->getSelected();
        
        $options = $elem->getOptions();
        if ($options) {
            foreach ($options as $option) {
                if ($selected_value && ($selected_value == $option['value'])) {
                    $selected = ' checked';
                } elseif (isset($option['selected']) && $option['selected'] == true) {
                    $selected = ' checked';
                } else {
                    $selected = '';
                }

                $css = $elem->getCssClass();
                if (!empty($css)) {
                    $label = '<label '. $css . '>';
                } else {
                    $label = '';
                }
                $html .= $label . '<input type="radio" name="'. $elem->getName() .'" value="'.$option['value'].'"'. $selected .'>'. $option['label'].'</label>'.PHP_EOL;
            }
        }        
        $error = $elem->getError();
        if (!empty($error)) {
            $html .= '<span class="'. $elem->getCssError() .'">'. $error .'</span>';
        }
        $html .= '<br style="clear:both" />';
        return $html;        
    }
}
