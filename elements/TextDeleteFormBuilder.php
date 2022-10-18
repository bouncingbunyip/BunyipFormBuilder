<?php

/**
 * Use this to add a text input with delete into a form
 * @author Chris Hubbard <chris@ibunyip.com>
 * @example examples/text.php
 * @package BunyipformBuilder
 */

namespace BunyipFormBuilder\elements;
use BunyipFormBuilder\ElementFormBuilder;

class TextDeleteFormBuilder extends ElementFormBuilder
{
    protected $required;
    protected $autofocus;
    protected $action;
    protected $deleteId;
    protected $class;
    protected $error;
    public $template = 'TextDeleteDefaultTemplate';
    protected $method;
    protected $form_name;

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
        $css = $this->getCssClass();
        if ($css) {
            array_push($attrs, $css);
        }
        return $attrs;
    }
    
    public function getAction() {
        return $this->action;
    }

    public function getMethod() {
        if (is_null($this->method)) {
            return 'POST';
        }
        if (!(in_array(strtolower($this->method), array('get', 'post')))) {
            return 'POST';
        }
        return strtoupper($this->method);
    }
    
    public function getDeleteId() {
        return $this->deleteId;
    }
    
    public function getFormName() {
        return $this->form_name;
    }
}
