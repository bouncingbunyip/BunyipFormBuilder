<?php

/**
 *
 * @author jackal
 *        
 */
namespace FormBuilder;

class CheckboxFormBuilder extends ElementFormBuilder
{
    protected $options;
    
    public $template = 'CheckboxDefaultTemplate';
    
    /**
     * getOptions
     * @return array Returns an array of the options set in the definition class
     */
    public function getOptions() {
        return $this->options;
    }
}
