<?php

/**
 *
 * @author jackal
 *        
 */
namespace BunyipFormBuilder\templates\Bootstrap;

class TwoTextInputsTemplate
{
    
    /**
     * getHtml
     */
    function getHtml($elem) {
        $html = '<!-- start bootstraptwotextinputs -->'. PHP_EOL;
//        $html .= '<div class="form-group row">'. PHP_EOL;
//        $html .= '    <div class="col">'. PHP_EOL;
        $html .= $elem->getInput('left');
//        $html .= '    </div>'. PHP_EOL;
//        $html .= '    <div class="col">'. PHP_EOL;
        $html .= $elem->getInput('right');
//        $html .= '    </div>'. PHP_EOL;
//        $html .= '</div>'. PHP_EOL;
        $html .= '<!-- end bootstraptwotextinputs -->'. PHP_EOL;
        return $html;
    }
}