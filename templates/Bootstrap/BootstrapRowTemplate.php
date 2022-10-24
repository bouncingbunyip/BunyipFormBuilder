<?php

/**
 *
 * @author jackal
 *        
 */
namespace BunyipFormBuilder;

class BootstrapRowTemplate
{

    /**
     * 
     */
    function __construct()
    {}
    
    /**
     * getHtml
     * want to produce something that looks like:
     * <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputCity">City</label>
            <input type="text" class="form-control" id="inputCity">
          </div>
          <div class="form-group col-md-4">
            <label for="inputState">State</label>
            <select id="inputState" class="form-control">
                <option selected>Choose...</option>
                <option>...</option>
            </select>
          </div>
          <div class="form-group col-md-2">
            <label for="inputZip">Zip</label>
            <input type="text" class="form-control" id="inputZip">
          </div>
      </div>
     * @todo The tooltip probably needs to be repositioned.
     */
    function getHtml($elem) {

        $label = $elem->getLabel();
        if ($label) {
            $html = '<label for="'. $elem->getId() .'">'. $elem->getLabel() .'</label>'. PHP_EOL;
        } else {
            $html = '';
        }
        $attrs = $elem->getAttributes();
        if ($attrs) {
            $str = ' '. implode(' ', $attrs);
        } else {
            $str = null;
        }
        $html .= '<input type="text" id="'. $elem->getId() .'" name="'. $elem->getName() .'" value="'. $elem->getValue() .'"'. $str .'>'.PHP_EOL;
        $html .= '<br clear="all">' . PHP_EOL;
        $error = $elem->getError();
        if (!empty($error)) {
            $html .= '<span class="'. $elem->getCssError() .'">'. $elem->getError() .'</span>';
        }
        if (isset($elem->tooltip)) {
            $html .= $elem->tooltip->render();
        }
        $html = '<div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputCity">City</label>
            <input type="text" class="form-control" id="inputCity">
          </div>
          <div class="form-group col-md-4">
            <label for="inputState">State</label>
            <select id="inputState" class="form-control">
                <option selected>Choose...</option>
                <option>...</option>
            </select>
          </div>
          <div class="form-group col-md-2">
            <label for="inputZip">Zip</label>
            <input type="text" class="form-control" id="inputZip">
          </div>
      </div>';
        return $html;
    }
}