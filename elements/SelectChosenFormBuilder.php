<?php

/**
 * Use this to add a select input into a form and add the Chosen library to it
 * @author Chris Hubbard <chris@ibunyip.com>
 * @example examples/select-chosen.php
 * @deprecated
 * @package BunyipformBuilder
 */

namespace BunyipFormBuilder\elements;
use BunyipFormBuilder\ElementFormBuilder;

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
