<?php

/**
 *
 * @author jackal
 *        
 */

/**
 * Hint CSS library for tooltips
 * for more info on hint: http://kushagragour.in/lab/hint/
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
namespace FormBuilder;

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
    
    public function render() {
        $html = '<div class="'. $this->class.'" data-hint="'. $this->text.'">'.$this->trigger.'</div>'.PHP_EOL;
        return $html;
    }
    /**
     * getDependencies
     * For this to work, the decorator needs to be contained within a form, won't work if it's just on an element
     * @return multitype:multitype:string
     */
    public function getDependencies() {
        $depend = array(0=>array('path'=>'addons/hint/hint.min.css', 'type'=>'css'));
        return $depend;
    }
}
