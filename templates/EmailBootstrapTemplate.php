<?php
/**
 * EmailBootstrapTemplate.php
 *
 * @version $Id: $
 * @package FormBulider
 * @copyright 2011 - 2020
 */

namespace BunyipFormBuilder;

class EmailBootstrapTemplate
{
    /**
     * <div class="form-group row">
     * <label for="example-email-input" class="col-2 col-form-label">Email</label>
     * <div class="col-10">
     * <input class="form-control" type="email" value="bootstrap@example.com" id="example-email-input">
     * </div>
     * </div>
     */
    function __construct()
    {
    }

    function getHtml(EmailFormBuilder $elem)
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
        $html .= '        <input class="form-control input-md" type="email" id="' . $elem->getId() . '" name="' . $elem->getName() . '" value="' . $elem->getValue() . '"' . $str . '>' . PHP_EOL;
        $error = $elem->getError();
        if (!empty($error)) {
            $html .= '<span class="err_msg">' . $error . '</span>';
        }
        $help = $elem->getHelpText();
        if (!empty($help)) {
            $html .= '<p id="passwordHelpBlock" class="form-text text-muted">' . PHP_EOL;
            $html .= $help . PHP_EOL;
            $html .= '</p>' . PHP_EOL;
        }
        if (isset($elem->tooltip)) {
            $html .= $elem->tooltip->render();
        }
        $html .= '    </div>' . PHP_EOL;
        $html .= '</div>' . PHP_EOL;
        return $html;
    }
}