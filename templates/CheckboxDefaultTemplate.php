<?php

/**
 *
 * @author jackal
 * @todo Added some <br> and <div> tags to get this to render vaguely accurately, they need to be removed at some point
 */
namespace FormBuilder;

class CheckboxDefaultTemplate
{

    /**
     * 
     */
    function __construct()
    {}
    
    function getHtml(CheckboxFormBuilder $elem) {
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

