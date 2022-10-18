<?php

/**
 * Use this to add an OpenTip tooltip into a form element
 * @author Chris Hubbard <chris@ibunyip.com>
 * @package BunyipformBuilder
 */

/**
 * Opentip library for tooltips
 * for more info on hint: http://www.opentip.org/documentation.html
 * 
 * Parial list of supported options:
 * data-ot-
 *  title (string)
 *  className (string)
 *  stem (boolean)
 *  delay (float)
 *  hideDelay (float)
 *  fixed (boolean)
 *  offset (offset: [0,0])
 *  
 * Partial list of unsupported options (only because I don't see a reason to suppor them)
 * data-ot-
 *  escapeTitle
 *  escapeContent
 *  showOn
 *  hideTrigger
 *  hideTriggers
 *  hideOn
 *  removeElementsOnHide
 *  
 *  @todo look at using the Javascript object implementation instead of the html attribute one
 */
namespace BunyipFormBuilder\decorators;

class OpentipDecorator
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
        $html = '<div data-ot="'. $this->text.'"'. $this->getOptions() .'>'.$this->trigger.'</div>';
        return $html;
    }

    public function getOptions() {
        $options = array('title', 'className', 'stem', 'delay', 'hideDelay', 'fixed', 'offset');
        $opts = array();
        foreach ($options as $option) {
            if (isset($this->$option)) {
                if (in_array($option, array('stem', 'fixed'))) {
                    if ($this->$option) {
                        $bool = 'true';
                    } else {
                        $bool = 'false';
                    }
                    $opts[] = 'data-ot-'.$option.'='.$bool;
                } else {
                    $opts[] = 'data-ot-'.$option.'="'.$this->$option.'"';
                } 
            }
        }
        if (count($opts) > 0) {
            $retval = ' '. implode(' ', $opts);
        } else {
            $retval = '';
        }
        return $retval;
    }
    
    public function getDependencies() {
        $depend = array(
            0=>array('path'=>'addons/opentip/downloads/opentip-native.js', 'type'=>'js'),
            1=>array('path'=>'addons/opentip/css/opentip.css', 'type'=>'css'),
        );
        return $depend;
    }
}
