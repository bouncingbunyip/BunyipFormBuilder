<?php 
/**
 * FieldsetFormBuilder.php
 *
 * @package BunyipFormBuilder
 * @copyright 2011-2022 Chris Hubbard
 */

/**
 * Description of Fieldset
 * This class creates a fieldset that can contain form elements or other fieldsets
 * 
 * @author Chris Hubbard <chris@ibunyip.com>
 */

namespace BunyipFormBuilder;

class FieldsetFormBuilder {
    
    public $title;
    public $id;
    public $name;
    public $class;
    public $elements;
    public $fieldsets;
    
    /**
     * __construct
     * @param string $title Used to set the heading or title of the fieldset
     * @param string $id Used to set the id attribute
     * @param string $name Used to set the name attribute
     */
    public function __construct($title = null, $id = null, $name = null, $class = null) {
        $attrs = array('title', 'id', 'name', 'class');
        foreach ($attrs as $attr) {
            if (!is_null(${$attr})) {
                $this->$attr = ${$attr};
            }
        }
        // if (!is_null($title)) {
        //     $this->title = $title;
        // }
        // if (!is_null($id)) {
        //     $this->id = $id;
        // }
        // if (!is_null($name)) {
        //     $this->name = $name;
        // }
    }
    
    /**
     * addElement
     * Use addElem() instead
     * 
     * @deprecated since version 303
     * @param array $element
     */
    public function addElement($element) {
        $this->elements[] = array('type'=>$element['type'], 'name'=>$element['name'], 'attrs'=>$element['attrs']);
    }
    
    /**
     * addElem
     * Use this to add form elements to the fieldset.
     * @param object $obj Should be a child of a BunyipFormBuilder instance
     */
    public function addElem($obj) {
        $this->elements[] = $obj;
    }

    public function addFieldset(FormFieldset $fieldset)
    {
        $this->fieldsets[] = $fieldset;
    }
    
    public function render($partial = null) {
        $html = '<fieldset';
        if (!is_null($this->id)) {
            $html .= ' id="'. $this->id .'"';
        }
        if (!is_null($this->name)) {
            $html .= ' name="'. $this->name .'"';
        }
        if (!is_null($this->class)) {
            $html .= ' class="'. $this->class .'"';
        }
        $html .= '>'.PHP_EOL;
        if (!is_null($this->title)) {
            $html .= '  <legend>'. $this->title .'</legend>'.PHP_EOL;
        }
        $html .= $partial;
        $html .= '</fieldset>'.PHP_EOL;
        return $html;
    }
}
