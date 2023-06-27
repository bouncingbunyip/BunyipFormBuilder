<?php

/**
 * Use this to add one or more checkboxes into a form
 * @author Chris Hubbard <chris@ibunyip.com>
 * @example examples/checkbox.php
 * @package BunyipformBuilder
 */

namespace BunyipFormBuilder\elements;
use BunyipFormBuilder\ElementFormBuilder;

class CheckboxFormBuilder extends ElementFormBuilder
{
    public $options;
    
    public $template = 'CheckboxDefaultTemplate';
    
    /**
     * getOptions
     * @return array Returns an array of the options set in the definition class
     */
    public function getOptions() {
        return $this->options;
    }
}
