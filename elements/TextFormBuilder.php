<?php

/**
 * Use this to add a text input into a form
 * @author Chris Hubbard <chris@ibunyip.com>
 * @example examples/text.php
 * @package BunyipformBuilder
 */

namespace BunyipFormBuilder\elements;
use BunyipFormBuilder\ElementFormBuilder;

/**
 * doesn't currently support aria-* attributes
 */
class TextFormBuilder extends ElementFormBuilder
{
    protected $required;
    protected $autofocus;
    protected $class;
    protected $error;
    public $template = 'TextDefaultTemplate';

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
        $css = $this->getCssClass('class');
        if ($css) {
            array_push($attrs, $css);
        }
        $labelcss = $this->getCssClass('labelCss');
        if ($labelcss) {
            array_push($attrs, $labelcss);
        }
        return $attrs;
    }
}
