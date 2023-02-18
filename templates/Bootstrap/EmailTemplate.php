<?php

/**
 * This is the Bootstrap themed template for the EmailFormBuilder.
 * @author Chris Hubbard <chris@ibunyip.com>
 * @package BunyipformBuilder
 */


namespace BunyipFormBuilder\templates\Bootstrap;

class EmailTemplate
{

    /**
     * getHtml
     * @see https://getbootstrap.com/docs/5.2/forms/overview/
     * <div class="mb-3">
     * <label for="exampleFormControlInput1" class="form-label">Email address</label>
     * <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
     * </div>
     */
    public function getHtml($elem): string {
        $html = '<div class="mb-3">'. PHP_EOL;

        $label = $elem->getLabel();
        if ($label) {
            $html .= '<label class="form-label" for="'. $elem->getId() .'">'. $elem->getLabel() .'</label>'. PHP_EOL;
        }

        $attrs = $elem->getAttributes();
        if ($attrs) {
            $str = ' '. implode(' ', $attrs);
        } else {
            $str = null;
        }
        $html .= '    <input type="email" class="form-control" id="'. $elem->getId() .'" name="'. $elem->getName() .'" value="'. $elem->getValue() .'"'. $str .'>'.PHP_EOL;
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