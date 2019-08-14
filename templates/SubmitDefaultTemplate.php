<?php

/**
 *
 * @author jackal
 *        
 */
namespace FormBuilder;

class SubmitDefaultTemplate
{

    /**
     */
    function __construct()
    {}
    
    function getHtml(SubmitFormBuilder $elem) {
        $css = $elem->getCssClass();
        if (!empty($css)) {
            $class = ' '. $elem->getCssClass();
        } else {
            $class = '';
        }
        $name = $elem->getName();
        if (!empty($name)) {
            $name = $elem->getName();
        } else {
            $name = 'submit';
        }
        $html = '<input type="submit" name="'. $name .'" value="'. $elem->getValue() .'"'. $class .'>'.PHP_EOL;
        return $html;
    }
}
