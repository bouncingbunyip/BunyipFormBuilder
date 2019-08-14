<?php

/**
 *
 * @author jackal
 *        
 */
namespace FormBuilder;

class DateDefaultTemplate {

    /**
     */
    function __construct() {
        
    }

    function getHtml(DateFormBuilder $elem) {
        $html = '<label>' . $elem->getLabel() . '</label>' . PHP_EOL;
        $attrs = $elem->getAttributes();
        if ($attrs) {
            $str = ' ' . implode(' ', $attrs);
        } else {
            $str = null;
        }
        $html .= '<input type="date" id="' . $elem->getId() . '" name="' . $elem->getName() . '" value="' . $elem->getValue() .'"'. $str .'>' . PHP_EOL;
        $error = $elem->getError();
        if (!empty($error)) {
            $html .= '<span class="'. $elem->getCssError() .'">' . $error . '</span>';
        }

        return $html;
    }

}
