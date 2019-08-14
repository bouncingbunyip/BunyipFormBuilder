<?php

/**
 *
 * @author jackal
 *        
 */
namespace FormBuilder;

class BootstrapSelectFormBuilder extends ElementFormBuilder
{
    protected $options;
    protected $optGroup;
        
    public $template = 'BootstrapSelectTemplate';
    
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
    
    public function getSelected() {
        if (!empty($this->selected)) {
            return $this->selected;
        } else {
            return false;
        }
    }

    public function getLabelSize() {
        if (!empty($this->labelSize)) {
            return $this->labelSize;
        } else {
            return false;
        }
    }

    public function getElementSize() {
        if (!empty($this->elementSize)) {
            return $this->elementSize;
        } else {
            return false;
        }
    }
}

