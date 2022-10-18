<?php

/**
 * This date picker can add a jQuery datepicker into a form
 * @author Chris Hubbard <chris@ibunyip.com>
 * @package BunyipformBuilder
 */

/**
 * jQuery DatePicker
 * for more info: https://jqueryui.com/datepicker/
 * 
 * Options:
 */
namespace BunyipFormBuilder\decorators;

class DatePickerDecorator
{
    public $text;
    public $trigger;
    public $class;
    protected $path;
    
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
        $html = ''.PHP_EOL;
        return $html;
    }
    
    public function getDependencies() {
        $depend = array();
        return $depend;
    }
}
