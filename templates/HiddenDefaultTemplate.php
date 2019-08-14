<?php

/**
 *
 * @author jackal
 *        
 */
namespace FormBuilder;

class HiddenDefaultTemplate
{

    /**
     */
    function __construct()
    {}
    
    function getHtml(HiddenFormBuilder $elem) {
        $html = '<input type="hidden" id="'. $elem->getId() .'" name="'. $elem->getName() .'" value="'. $elem->getValue() .'">'.PHP_EOL;
        return $html;
    }
}
