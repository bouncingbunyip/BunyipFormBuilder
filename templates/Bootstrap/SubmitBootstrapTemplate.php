<?php

/**
 *
 * @author jackal
 *
 */

namespace BunyipFormBuilder; 

class SubmitBootstrapTemplate
{

    /**
     * <div class="form-group">
     * <label class="col-md-4 control-label" for="singlebutton">Single Button</label>
     * <div class="col-md-4">
     * <button id="singlebutton" name="singlebutton" class="btn btn-primary">Button</button>
     * </div>
     * </div>
     */

    public function getHtml(SubmitFormBuilder $elem)
    {
        $css = $elem->getCssClass();
        if (!empty($css)) {
            $class = ' ' . $elem->getCssClass();
        } else {
            $class = ' class="btn btn-primary"';
        }
        $name = $elem->getName();
        if (!empty($name)) {
            $name = $elem->getName();
        } else {
            $name = 'submit';
        }
        $html = '<div class="form-group">' . PHP_EOL;
        $html .= '    <div class="col-sm-4">' . PHP_EOL;
        $html .= '        <button name="' . $name . '"' . $class . '>' . $elem->getValue() . '</button>' . PHP_EOL;
        $html .= '    </div>' . PHP_EOL;
        $html .= '</div>' . PHP_EOL;
        return $html;
    }
}