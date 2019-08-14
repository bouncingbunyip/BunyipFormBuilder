<?php

/**
 *
 * @author jackal
 *        
 */
namespace FormBuilder;

class SelectChosenFormBuilder extends ElementFormBuilder
{
    protected $options;
    protected $optGroup;
    protected $chosenOptions;
    protected $placeholder = 'Choose an option...';
    public $template = 'SelectChosenTemplate';
    
    /**
     * getOptions
     * @return array Returns an array of the options set in the definition class
     */
    public function getOptions() {
        return $this->options;
    }
    
    public function getOptGroup() {
        if (!empty($this->optGroup)) {
            return $this->optGroup;
        } else {
            return false;
        }
    }

    public function getChosenOptions() {
        return $this->chosenOptions;
    }

    public function getPlaceholder() {
        return $this->placeholder;
    }
}
