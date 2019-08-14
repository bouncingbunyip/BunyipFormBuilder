<?php

/**
 *
 * @author jackal
 *        
 */
namespace FormBuilder;

class ButtonFormBuilder extends ElementFormBuilder
{
    protected $required;
    protected $autofocus;
    protected $class;
    protected $error;
    public $template = 'ButtonDefaultTemplate';
    
    /**
     * 
     */
    public function getOnClick() {
        if (!empty($this->onclick)) {
            return $this->onclick;
        } else {
            return false;
        }
    }
}
