<?php

/**
 *
 * @author jackal
 *        
 */
namespace FormBuilder;

class TwoFormInputsOnRowTemplate
{

    /**
     * 
     */
    function __construct()
    {}
    
    /**
     * getHtml
     */
    function getHtml(TwoFormInputsOnRowFormBuilder $elem) {
        $html = '<style>'. PHP_EOL;
        $html .= $elem->getThisCss() . PHP_EOL;
        $html .= '</style>' .PHP_EOL;

        $html .= '<div class="wrapper">
<div id="left">
'. $elem->getInput('left') .'</div>
';

        $html .= '<div id="right">
'. $elem->getInput('right') .'</div>
';

        $html .= '</div><br style="clear: both">
';
        return $html;
    }
}