<?php

/**
 * Use this to add a 'tooltip' hint into a form element
 * @author Chris Hubbard <chris@ibunyip.com>
 * @package BunyipformBuilder
 */

/**
 * Hint CSS library for tooltips
 * for more info on hint: https://kushagra.dev/lab/hint/
 * 
 * Class attributes:
 * hint--top
 * hint--right
 * hint--bottom
 * hint--left
 * 
 * hint--error
 * hint--warning
 * hint--info
 * hint--success
 * 
 * hint--always
 * hint--rounded
 * hint--no-animate
 * hint--bounce
 * 
 * Can any of the above
 */
namespace BunyipFormBuilder\decorators;

class HintDecorator
{
    public $text;
    public $trigger;
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
    
    public function render() : string {
        $html = '<div class="'. $this->class.'" aria-label="'. $this->text.'">'.$this->trigger.'</div>'.PHP_EOL;
        return $html;
    }
    /**
     * getDependencies
     * For this to work, the decorator needs to be contained within a form, won't work if it's just on an element
     * <link href="https://unpkg.com/hint.css@2.7.0/hint.min.css" media="screen" rel="stylesheet" type="text/css" />
     * @return array
     */
    public function getDependencies() : array {
        return array(0=>array('path'=>'https://unpkg.com/hint.css@2.7.0/hint.min.css', 'type'=>'css'));
    }
}
