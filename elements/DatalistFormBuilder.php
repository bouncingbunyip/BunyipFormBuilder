<?php

/**
 * Use this to add a datalist input into a form.
 * @author Chris Hubbard <chris@ibunyip.com>
 * @example examples/select.php
 * @package BunyipformBuilder
 */

namespace BunyipFormBuilder\elements;
use BunyipFormBuilder\ElementFormBuilder;

class DatalistFormBuilder extends ElementFormBuilder
{
    protected $options;
    protected $list;
        
    public $template = 'DatalistDefaultTemplate';
    
    /**
     * getOptions
     * @return array Returns an array of the options set in the definition class
     */
    public function getOptions() {
        return $this->options;
    }
    
    public function getList() {
        return $this->list;
    }

}

