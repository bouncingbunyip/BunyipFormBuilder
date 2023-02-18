<?php

/**
 * This is the Bootstrap themed template for the TextareaFormBuilder.
 * @author Chris Hubbard <chris@ibunyip.com>
 * @package BunyipformBuilder
 */


namespace BunyipFormBuilder\templates\Bootstrap;

class TextareaTemplate
{

    /**
     * getHtml
     * @see https://getbootstrap.com/docs/5.2/forms/overview/
     * <div class="mb-3">
     * <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
     * <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
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
        $rows = $elem->getRows();
        if (!$rows) {
            $count = count(explode(PHP_EOL, $elem->getValue()));

            if ($count) {
                $rows = ' rows="'. $count .'"';
            } else {
                $rows = '';
            }
        } else {
            $rows = ' rows="'. $elem->getRows() .'"';
        }
        $html .= '  <textarea class="form-control"'. $rows .' id="'. $elem->getId() .'" name="'. $elem->getName() .'"'. $str .' aria-describedby="'. $elem->getId() .'HelpBlock">'. $elem->getValue() .'</textarea>'.PHP_EOL;
        if (!empty($elem->helptext)) {
            $html .= '  <small id="'. $elem->getId() .'HelpBlock" class="form-text text-muted">'. $elem->helptext .'</small>'. PHP_EOL;
        }
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