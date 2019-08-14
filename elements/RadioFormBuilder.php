<?php

/**
 *
 * @author jackal
 *        
 */
namespace FormBuilder;

class RadioFormBuilder extends ElementFormBuilder
{
    protected $options;
    
    public $template = 'RadioDefaultTemplate';
    
    /**
     * getOptions
     * These options become the radio choices
     * @return array The array of (at least) name=>value pairs for the options
     */
    public function getOptions() {
        return $this->options;
    }
    
    /**
     * getSelected
     * @return mixed If set, the 'selected' value should match one the option values
     */
    public function getSelected() {
        return isset($this->selected) ? $this->selected : FALSE;
    }
}

