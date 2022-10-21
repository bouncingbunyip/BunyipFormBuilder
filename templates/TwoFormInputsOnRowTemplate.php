<?php

/**
 *
 * @author jackal
 *        
 */
namespace BunyipFormBuilder\templates;

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
    public function getHtml($elem) {
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