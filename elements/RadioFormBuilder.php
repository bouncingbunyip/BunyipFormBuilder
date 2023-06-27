<?php

/**
 * Use this to add one or more radio inputs into a form
 * @author Chris Hubbard <chris@ibunyip.com>
 * @example examples/radio.php
 * @package BunyipformBuilder
 */

namespace BunyipFormBuilder\elements;
use BunyipFormBuilder\ElementFormBuilder;

class RadioFormBuilder extends ElementFormBuilder
{
    public $options;
    
    public $template = 'RadioDefaultTemplate';
    
    public function getAttributes() {
        $attrs = array();
        $req = $this->getRequired();
        if ($req) {
            array_push($attrs, $req);
        }
        $css = $this->getCssClass('class');
        if ($css) {
            array_push($attrs, $css);
        }
        $labelcss = $this->getCssClass('labelCss');
        if ($labelcss) {
            array_push($attrs, $labelcss);
        }
        return $attrs;
    }
	
    /**
     * getOptions
     * These options become the radio choices
     * @return array The array of (at least) name=>value pairs for the options
     */
    public function getOptions() {
        return $this->options;
    }
    
    /**
     * getSelected
     * @return mixed If set, the 'selected' value should match one the option values
     */
    public function getSelected() {
        return isset($this->selected) ? $this->selected : FALSE;
    }
}

