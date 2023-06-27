<?php

/**
 * Use this to add an email input into a form
 * @author Chris Hubbard <chris@ibunyip.com>
 * @example examples/email.php
 * @package BunyipformBuilder
 */

namespace BunyipFormBuilder\elements;
use BunyipFormBuilder\ElementFormBuilder;

class EmailFormBuilder extends ElementFormBuilder
{
    protected $required;
    protected $autofocus;
    protected $class;
    protected $error;
    public $template = 'EmailDefaultTemplate';
    
    /**
     * 
     */
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
        return $attrs;
    }
}
