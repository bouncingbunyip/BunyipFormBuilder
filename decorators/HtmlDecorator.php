<?php

/**
 *
 * @author jackal
 *        
 */

/**
 * Basic HTML container that can be added after an input element
 */
namespace FormBuilder;

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
