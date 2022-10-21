<?php

/**
 *
 * @author jackal
 *        
 */
namespace BunyipFormBuilder\elements;
use BunyipFormBuilder\ElementFormBuilder;

class TwoFormInputsOnRowFormBuilder extends ElementFormBuilder
{
    protected $required;
    protected $autofocus;
    protected $class;
    protected $error;
    public $template = 'TwoFormInputsOnRowTemplate';

    protected $left;
    protected $right;
    protected $css = 'div#left {
  float: left;
}
div#right {
  float: right;
}';

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

    public function getInput($side) {
        return $this->$side;
    }

    public function getThisCss() {
        return $this->css;
    }
}
