<?php

/**
 *
 * @author jackal
 *        
 */

namespace BunyipFormBuilder;

class FileBootstrapTemplate
{

    /**
     */
    function __construct()
    {}

    /**
     * <div class="form-group">
     *   <label for="exampleFormControlFile1">Example file input</label>
     *   <input type="file" class="form-control-file" id="exampleFormControlFile1">
     * </div>
     * @param FileFormBuilder $elem
     * @return string
     */
    function getHtml(FileFormBuilder $elem) {
        $html = '<div class="form-group row">'. PHP_EOL;

        $label = $elem->getLabel();
        if ($label) {
            $html .= '<label class="col-form-label col-sm-2" for="'. $elem->getId() .'">'. $elem->getLabel() .'</label>'. PHP_EOL;
        }
        $html .= '  <div class="col-sm-10">'.PHP_EOL;

        $attrs = $elem->getAttributes();
        if ($attrs) {
            $str = ' '. implode(' ', $attrs);
        } else {
            $str = null;
        }

        $html .= '    <input type="file" id="'. $elem->getId() .'" name="'. $elem->getName() .'" value="'. $elem->getValue() .'"'. $str .'>'.PHP_EOL;
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
