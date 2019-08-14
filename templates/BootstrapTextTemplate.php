<?php

/**
 *
 * @author jackal
 *        
 */
namespace FormBuilder;

class BootstrapTextTemplate
{

    /**
     * 
     */
    function __construct()
    {}
    
    /**
     * getHtml
     *           <div class="form-group col-md-6">
    <label for="inputCity">City</label>
    <input type="text" class="form-control" id="inputCity">
    </div>
     */
    function getHtml(BootstrapTextFormBuilder $elem) {
        $html = '<div class="form-group row">'. PHP_EOL;
        $label = $elem->getLabel();
        if ($label) {
            $html .= '  <label for="'. $elem->getId() .'">'. $elem->getLabel() .'</label>'. PHP_EOL;
//            $html .= '  <label class="col-sm-2" for="'. $elem->getId() .'">'. $elem->getLabel() .'</label>'. PHP_EOL;
        }
        $attrs = $elem->getAttributes();
        if ($attrs) {
            $str = ' '. implode(' ', $attrs);
        } else {
            $str = null;
        }
//        $html .= '  <div class="col-sm-10">'.PHP_EOL;
        $html .= '  <div>'.PHP_EOL;
        $html .= '    <input type="text" id="'. $elem->getId() .'" name="'. $elem->getName() .'" value="'. $elem->getValue() .'"'. $str .'>'.PHP_EOL;
        $html .= '  </div>' . PHP_EOL;
        $html .= '</div>' . PHP_EOL;
        $error = $elem->getError();
        if (!empty($error)) {
            $html .= '<div class="invalid-feedback">
        ' . $elem->getError() . '</div>';
        }
        return $html;
    }
}