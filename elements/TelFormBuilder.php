<?php

/**
 * Use this to add a telephone input into a form
 * @author Chris Hubbard <chris@ibunyip.com>
 * @example examples/???.php
 * @package BunyipformBuilder
 * @todo this needs to be finished
 */

namespace BunyipFormBuilder;
use BunyipFormBuilder\ElementFormBuilder;

class TelFormBuilder extends ElementFormBuilder
{
    protected $required;
    protected $autofocus;
    protected $class;
    protected $error;
    public $template = 'TelDefaultTemplate';

    public function getAttributes()
    {
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
