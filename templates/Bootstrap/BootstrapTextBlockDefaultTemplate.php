<?php

/**
 *
 * @author jackal
 *        
 */
namespace BunyipFormBuilder;

class BootstrapTextBlockDefaultTemplate
{

    /**
     */
    function __construct()
    {}
    
    function getHtml(TextBlockFormBuilder $elem) {
//        $css = $elem->getCssClass();
//        if (!empty($css)) {
//            $class = ' '. $css;
//        } else {
//            $class = '';
//        }
//
//        $html = '<div'.$class.'>'.PHP_EOL;
//        $label = $elem->getLabel();
//        if (!empty($label)) {
//            $html .= '    <div class="legend">' . $label . '</div>' . PHP_EOL;
//        }
//        $html .= '    <div class="text_block">'. $elem->getContent() .'</div>'.PHP_EOL;
//        $error = $elem->getError();
//        if (!empty($error)) {
//            $html .= '    <span class="'. $elem->getCssError() .'">'. $error .'</span>'.PHP_EOL;
//        }
//
//        $html .= '</div>'.PHP_EOL;
        $html = '<div class="col">'. $elem->getContent() .'</div>'.PHP_EOL;
        return $html;
    }
}
