<?php
/**
 * ElementFormBuilder.php
 *
 * @version $Id: ElementFormBuilder.php 306 2016-02-06 03:01:45Z chris@ourgourmetlife.com $
 * @package FormBuilder
 * @copyright 2011-2019 Chris Hubbard
 */

/**
 * Description of Element
 * This is the parent class that all the 'element' classes extend
 * 
 * @author Chris Hubbard <chris@ourgourmetlife.com>
 */
namespace FormBuilder;

class ElementFormBuilder
{
    protected $label;
    protected $id;
    protected $name;
    protected $value;
    protected $class;
    protected $required;
    protected $error;
    protected $csserror = 'err-msg';
    
    /**
     * __construct
     * In general usage, this class will never be called directly.  It should be called through it's 
     * child classes.
     * @param array $attrs An array of the attributes to pass to the Element class
     */
    function __construct($attrs = null) {
        if (is_array($attrs)) {
            foreach ($attrs as $key=>$value) {
                $this->$key = $value;
            }
        }
    }
        
    public function getLabel() {
        return $this->label;
    }
    
    public function getId() {
        if (empty($this->id)) {
            return $this->name;
        } else {
            return $this->id;
        }
    }

    public function getName() {
        return $this->name;
    }
    
    public function getValue() {
        return $this->value;
    }    

    public function render() {
        $template = '\FormBuilder\\'. $this->template;
        $tpl = new $template;
        $html = $tpl->getHtml($this);
        return $html;
    }
    
    public function setClass($class) {
        $this->class = $class;
    }

    public function setRequired($required) {
        $this->required = $required;
    }
    
    public function getRequired() {
        if (isset($this->required) && ($this->required === true)) {
            $required = 'required="required"';
        } else {
            $required = false;
        }
        return $required;
    }

    public function getClass() {
        return $this->class;
    }

    public function getCssClass() {
        $class = null;
        if (isset($this->class)) {
            $class[] = $this->class;
        }
        if (!empty($this->error)) {
            $class[] = 'error';
        }
        $retval = is_null($class) ? false : 'class="'. implode(' ', $class) .'"';
        return $retval;
    }
    
    public function getError() {
        if (!empty($this->error)) {
            return $this->error;
        } else {
            return false;
        }
    }
    
    public function getAutofocus() {
        if (!empty($this->autofocus) && ($this->autofocus == $this->name)) {
            return 'autofocus';
        }    
        return false;
    }
    
    public function setTemplate($name) {
        $this->template = $name;
    }

    public function setCssError($css) {
        $this->csserror = $css;
    }

    public function getCssError() {
        return $this->csserror;
    }
}