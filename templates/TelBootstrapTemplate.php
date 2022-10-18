<?php
/**
 * TelBootstrapTemplate.php
 *
 * @version $Id: $
 * @package BunyipFormBuilder
 * @copyright 2011 - 2020
 */

namespace BunyipFormBuilder;

class TelBootstrapTemplate
{
    /**
     * <div class="form-group row">
     * <label for="example-tel-input" class="col-2 col-form-label">Telephone</label>
     * <div class="col-10">
     * <input class="form-control" type="tel" value="1-(555)-555-5555" id="example-tel-input">
     * </div>
     * </div>
     */
    function __construct()
    {
    }

    function getHtml(TelFormBuilder $elem)
    {
        $html = '<div class="form-group">' . PHP_EOL;
        $html .= '    <label for="' . $elem->getId() . '" class="col-sm-4 control-label">' . $elem->getLabel() . '</label>' . PHP_EOL;
        $html .= '    <div class="col-sm-4">' . PHP_EOL;
        $attrs = $elem->getAttributes();
        if ($attrs) {
            $str = ' ' . implode(' ', $attrs);
        } else {
            $str = null;
        }
        $html .= '        <input class="form-control input-md" type="tel" id="' . $elem->getId() . '" name="' . $elem->getName() . '" value="' . $elem->getValue() . '"' . $str . '>' . PHP_EOL;
        $error = $elem->getError();
        if (!empty($error)) {
            $html .= '<span class="err_msg">' . $error . '</span>';
        }

        if (isset($elem->tooltip)) {
            $html .= $elem->tooltip->render();
        }
        $html .= '    </div>' . PHP_EOL;
        $html .= '</div>' . PHP_EOL;
        return $html;
    }
}