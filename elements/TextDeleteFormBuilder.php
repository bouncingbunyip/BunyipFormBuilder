<?php

/**
 *
 * @author jackal
 *        
 */
namespace FormBuilder;

class TextDeleteFormBuilder extends ElementFormBuilder
{
    protected $required;
    protected $autofocus;
    protected $action;
    protected $deleteId;
    protected $class;
    protected $error;
    public $template = 'TextDeleteDefaultTemplate';
    
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
    
}