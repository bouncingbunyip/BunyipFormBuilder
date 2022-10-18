<?php

/**
 * Use this to add a Date Picker into a form
 * @author Chris Hubbard <chris@ibunyip.com>
 * @example examples/datepicker.php
 * @see http://api.jqueryui.com/datepicker/
 * @package BunyipformBuilder
 */

namespace BunyipFormBuilder\elements;
use BunyipFormBuilder\ElementFormBuilder;

class DatePickerFormBuilder extends ElementFormBuilder
{
    protected $required;
    protected $autofocus;
    protected $class;
    protected $error;
    public $template = 'DatePickerDefaultTemplate';

    public function getAttributes() {
        $attrs = array();
        $req = $this->getRequired();
        if ($req) {
            array_push($attrs, $req);
        }
        $focus = $this->getAutofocus();
        if ($focus) {
            array_push($attrs, $focus);
        }
        $css = $this->getCssClass();
        if ($css) {
            array_push($attrs, $css);
        }
        return $attrs;
    }
}

