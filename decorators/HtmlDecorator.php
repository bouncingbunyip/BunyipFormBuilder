<?php

/**
 * Use this to add arbitrary HTML into a form
 * @author Chris Hubbard <chris@ibunyip.com>
 * @package BunyipformBuilder
 */

/**
 * Basic HTML container that can be added after an input element
 */
namespace BunyipFormBuilder\decorators;

class HtmlDecorator
{
    public $html;
    public $class;
    
    /**
     * 
     * @param array $attrs
     */
    function __construct($attrs)
    {
        if (is_array($attrs)) {
            foreach ($attrs as $key=>$value) {
                $this->$key = $value;
            }
        }
    }
    
    public function render() {
        $html = '<div class="'. $this->class.'">'.$this->html.'</div>'.PHP_EOL;
        return $html;
    }
    
    public function getDependencies() {
        return false;
    }
}
