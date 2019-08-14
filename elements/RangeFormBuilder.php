<?php

/**
 *
 * @author jackal
 *        
 */
namespace FormBuilder;

class RangeFormBuilder extends ElementFormBuilder
{
    protected $required;
    protected $autofocus;
    protected $class;
    protected $error;
    protected $value = '50';
    protected $min = 0;
    protected $max = 100;
    
    public $template = 'RangeDefaultTemplate';
    
    public function getMin() {
        return $this->min;
    }
    
    public function getMax() {
        return $this->max;
    }
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
}
