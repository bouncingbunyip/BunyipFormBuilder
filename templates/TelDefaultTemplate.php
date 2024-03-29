<?php

/**
 *
 * @author Chris Hubbard <chris@ibunyip.com>
 *
 */
namespace BunyipFormBuilder;

class TelDefaultTemplate
{

    /**
     */
    function __construct()
    {
    }

    function getHtml(TelFormBuilder $elem)
    {
        $html = '<label for="' . $elem->getId() . '">' . $elem->getLabel() . '</label>' . PHP_EOL;
        $attrs = $elem->getAttributes();
        if ($attrs) {
            $str = ' ' . implode(' ', $attrs);
        } else {
            $str = null;
        }
        $html .= '<input type="tel" id="' . $elem->getId() . '" name="' . $elem->getName() . '" value="' . $elem->getValue() . '"' . $str . '>' . PHP_EOL;
        $error = $elem->getError();
        if (!empty($error)) {
            $html .= '<span class="err_msg">' . $error . '</span>';
        }

        if (isset($elem->tooltip)) {
            $html .= $elem->tooltip->render();
        }
        return $html;
    }
}