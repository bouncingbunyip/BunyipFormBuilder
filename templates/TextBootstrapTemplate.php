<?php

/**
 *
 * @author jackal
 *        
 */

namespace FormBuilder;

class TextBootstrapTemplate
{

    /**
     * 
     */
    function __construct()
    {}
    
    /**
     * getHtml
     * <div class="form-group">
     *     <label class="col-form-label" for="formGroupExampleInput">Example label</label>
     *     <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">
     * </div>
     */
    function getHtml(TextFormBuilder $elem) {
        $html = '<div class="form-group row">'. PHP_EOL;
        $label = $elem->getLabel();
        if ($label) {
            $html .= '  <label class="col-form-label col-sm-2" for="'. $elem->getId() .'">'. $elem->getLabel() .'</label>'. PHP_EOL;
        }
        $attrs = $elem->getAttributes();
        if ($attrs) {
            $str = ' '. implode(' ', $attrs);
        } else {
            $str = null;
        }
        $html .= '  <div class="col-sm-10">'.PHP_EOL;
        $html .= '    <input type="text" id="'. $elem->getId() .'" name="'. $elem->getName() .'" value="'. $elem->getValue() .'"'. $str .'>'.PHP_EOL;
        $html .= '  </div>' . PHP_EOL;
        $html .= '</div>' . PHP_EOL;
        $error = $elem->getError();
        if (!empty($error)) {
            $html .= '<div class="invalid-feedback">
        '. $elem->getError() .'
      </div>';
        }
        if (isset($elem->tooltip)) {
            $html .= $elem->tooltip->render();
        }        
        return $html;
    }
}