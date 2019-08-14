<?php

/**
 *
 * @author jackal
 *        
 */
namespace FormBuilder;

class HiddenCsrfDefaultTemplate
{

    /**
     */
    function __construct()
    {}
    
    function getHtml(HiddenCsrfFormBuilder $elem) {
        $html = '<input type="hidden" id="'. $elem->getId() .'" name="'. $elem->getName() .'" value="'. $elem->getValue() .'">'.PHP_EOL;
        return $html;
    }
}
