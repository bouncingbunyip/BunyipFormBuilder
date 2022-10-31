<?php

/**
 * This is the Bootstrap themed template for the PasswordFormBuilder.
 * @author Chris Hubbard <chris@ibunyip.com>
 * @package BunyipformBuilder
 */

namespace BunyipFormBuilder\templates\Bootstrap;

class PasswordTemplate
{

    /**
     * getHtml
     * @see https://getbootstrap.com/docs/5.2/forms/overview/
     * <label for="inputPassword5" class="form-label">Password</label>
     * <input type="password" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock">
     * <div id="passwordHelpBlock" class="form-text">
     *   Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
     * </div>
     */
    public function getHtml($elem): string
    {
        $html = '';
        $label = $elem->getLabel();
        if ($label) {
            $html .= '  <label class="form-label" for="'. $elem->getId() .'">'. $elem->getLabel() .'</label>'. PHP_EOL;
        }
        $attrs = $elem->getAttributes();
        if ($attrs) {
            $str = ' '. implode(' ', $attrs);
        } else {
            $str = null;
        }
        $html .= '    <input type="password" id="'. $elem->getId() .'" name="'. $elem->getName() .'" value="'. $elem->getValue() .'"'. $str .'>'.PHP_EOL;
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