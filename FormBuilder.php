<?php

/**
 * FormBuilder.php
 * 
 * @version $Id: FormBuilder.php 314 2016-02-19 17:37:02Z chris@ourgourmetlife.com $
 * @package FormBuilder 
 * @copyright 2011-2019 Chris Hubbard
 */

/**
 * Description of FormBuilder
 * 
 * @author Chris Hubbard <chris@ourgourmetlife.com>
 */
namespace FormBuilder;

use \FormBuilder\ValidatorResults;
use \FormBuilder\Validator;

class FormBuilder {

    protected $strict = true;
    protected $method = 'post';
    protected $action = 'index.php';
    protected $class = 'vi-form';
    protected $autofocus = '';
    protected $fieldsets = null;
    protected $elements = array();
    protected $externalCss = array();
    protected $externalJs = array();
    protected $uid = null;
    protected $uidHelper;
    protected $dependencies = array();
    protected $theme = 'default';
    protected $validator;
    const VICSRF = 'vicsrf';

    protected $attributes = array('accept-charset', 'action', 'autocomplete', 'enctype', 'id', 'method', 'name', 'novalidate', 'target');

    /**
     * __construct
     * Can receive an array of key->value pairs that are used to set the form attributes
     *  accept: (not implemented)
     *  accept-charset: (see http://www.w3schools.com/tags/ref_charactersets.asp)
     *  action: the script that receives the form submission
     *  autocomplete: on or off
     *  enctype: three valid values, see getFormAttributes() for details
     *  id: the form id
     *  method: get or post
     *  name: Specifies the name of a form
     *  novalidate
     *  target: _blank, _self (default), _parent, _top 
     * 
     * @param array $attrs An array of key->value pairs
     * @see http://www.w3schools.com/tags/tag_form.asp
     */
    public function __construct($attrs = null) {
        if(!is_null($attrs)) {
            $this->setFormAttributes($attrs);
        }
    }

    public function setValidator(Validator $validator) {
        $this->validator = $validator;
    }

    public function getValidator() {
        return $this->validator;
    }

    /**
     * can be used to change the 'theme' for the form element HTML
     * @param $theme
     */
    public function setTheme($theme) {
        $this->theme = $theme;
    }

    public function getTheme() {
        return $this->theme;
    }

    public function setStrict($bool) {
        $this->strict = (bool)$bool;
    }

    public function getStrict() {
        return $this->strict;
    }

    public function setMethod($method = 'post')
    {
        $this->method = $method;
    }

    public function getMethod()
    {
        if (!$this->strict) {
            return $this->method;
        } else {
            if (in_array($this->method, array('get', 'post'))) {
                return $this->method;
            } else {
                return 'post';
            }
        }
    }

    public function setAction($action) {
        $this->action = $action;
    }

    public function getAction()
    {
        return $this->action;
    }

    public function setClass($class) {
        $this->class = $class;
    }

    public function getClass()
    {
        return $this->class;
    }
    
    public function setAutofocus($inputname) {
        $this->autofocus = $inputname;
    }

    public function getAutofocus()
    {
        return $this->autofocus;
    }

    public function setFieldset($fieldset) {
        $this->fieldsets[] = $fieldset;
    }

    public function getFieldsets() {
        return $this->fieldsets;
    }

    /**
     * addFieldset
     * This is a helper method used to create a new Fieldset, need to add the 
     * fieldset to the form with setFieldset()
     * @param string $title Will be used as the <legend>$title</legend> for the fieldset
     * @param string $id The Id for the fieldset e.g.: id="my-id"
     * @param string $name The Name for the fieldset e.g.: name="my-name"
     * @return FieldsetFormBuilder
     */
    public function addFieldset($title = null, $id = null, $name = null, $class = null) {
        $fieldset = new FieldsetFormBuilder($title, $id, $name, $class);
        return $fieldset;
    }

    public function setUidHelper($object) {
        $this->uidHelper = $object;
    }

    public function setUid($uid) {
        $this->uid = $uid;
    }

    public function getUid() {
        if (is_null($this->uid)) {
            if (!is_null($this->uidHelper)) {
                $this->uid = $this->uidHelper->makeUid();
            } else {
                $this->uid = $this->makeUid();
            }
        }
        return $this->uid;
    }

    /**
     * makeUid
     * This a fairly lame version of a uid.  Would be better to pass in a helper to make a better one.
     * But for those times/projects where you don't have a helper class, this will make something.
     * @return string
     */
    public function makeUid() {
        $length = 16;
        $character_set = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';

        $temp_array = array();
        for ($i = 0; $i < $length; $i++) {
            $temp_array[] = $character_set[rand(0, strlen($character_set) - 1)];
        }
        shuffle($temp_array);
        return implode($temp_array);
    }

    public static function getCsrf() {
        $fb = new FormBuilder();
        return $fb->getUid();
    }

    /**
     * addElem
     * @param object $obj Should be one of the FormBuilder element classes
     * @param object $fieldset Should be a FormFieldset object.
     */
    public function addElem($obj, $fieldset = null) {
        if (!is_null($fieldset)) {
            $fieldset->addElem($obj);
        } else {
            $this->elements[] = $obj;
        }
        if (isset($obj->tooltip)) {
            $dependencies = $obj->tooltip->getDependencies();
            if ($dependencies) {
                foreach ($dependencies as $depend) {
                    $rs = $this->registerExternal($depend['path'], $depend['type']);
                }
            }
        }
    }

    /**
     * registerExternal
     * Use this method to register an external CSS or Javascript that is needed for this form
     * @param string $external
     * @param string $type Should be either 'css' or 'js'
     * @return boolean Returns true on success, otherwise fail
     */
    public function registerExternal($external, $type) {
        if (strtolower($type) == 'css') {
            array_push($this->externalCss, $external);
            return true;
        }
        if (strtolower($type) == 'js') {
            array_push($this->externalJs, $external);
            return true;
        }
        return false;
    }

    public function getExternalCss() {
        return array_keys(array_flip($this->externalCss));
    }

    public function getExternalJs() {
        return array_keys(array_flip($this->externalJs));
    }

    /**
     * setFormAttributes
     * 
     * @param array $attrs An array of key->value pairs
     */
    public function setFormAttributes($attrs = null)
    {
        if (!is_null($attrs)) {
            foreach ($attrs as $key => $value) {
                if ($this->strict) {
                    if (in_array($key, $this->attributes)) {
                        $this->$key = $value;
                    }
                } else {
                    array_push($this->attributes, $key);
                    $this->$key = $value;
                }
            }
        }
    }

    /**
     * getFormAttributes
     * Looks through the possible (and supported) form attributes that may or may not have been set
     * Does some rudimentary validation of values and then composites a string that can be inserted into the <form> tag.
     * @return string
     */
    public function getFormAttributes() {
        $str = array('');
        foreach ($this->attributes as $attr) {
            if (!empty($this->$attr)) {
                switch ($attr) {
                    case 'autocomplete':
                        $valid = array('on', 'off');
                        if (!in_array($this->$attr, $valid)) {
                            $this->$attr = 'off';
                        }
                        $str[] = $attr . '="' . $this->$attr . '"';
                        break;
                    case 'enctype':
                        $valid = array('application/x-www-form-urlencoded', 'multipart/form-data', 'text/plain');
                        if (!in_array($this->$attr, $valid)) {
                            $this->$attr = 'application/x-www-form-urlencoded';
                        }
                        $str[] = $attr . '="' . $this->$attr . '"';
                        break;
                    case 'method':
                        $valid = array('get', 'post');
                        if (!in_array($this->$attr, $valid)) {
                            $this->$attr = 'post';
                        }
                        $str[] = $attr . '="' . $this->$attr . '"';
                        break;
                    case 'novalidate':
                        $str[] = 'novalidate';
                        break;
                    /** 
                     * @todo This does not support named framesets 
                     */
                    case 'target':
                        $valid = array('_blank', '_self', '_parent', '_top');
                        if (!in_array($this->$attr, $valid)) {
                            $this->$attr = '_self';
                        }
                        $str[] = $attr . '="' . $this->$attr . '"';
                        break;
                    default:
                        $str[] = $attr . '="' . $this->$attr . '"';
                        break;
                }
            }
        }
        return implode(' ', $str);
    }

    /**
     * render
     * This method loops through the fieldsets and elements to create the HTML
     * that corresponds to the defined form elements.
     * Use setFieldset() to 'close' a fieldset. 
     * Use addElem() to add elements to a form or a fieldset 
     * 
     * @return string
     */
    public function render() {
        $html = '';
        $css = $this->getExternalCss();
        if ($css) {
            foreach ($css as $stylesheet) {
                $html .= '<link href="' . $stylesheet . '" media="screen" rel="stylesheet" type="text/css" />' . PHP_EOL;
            }
        }
        $js = $this->getExternalJs();
        if ($js) {
            foreach ($js as $script) {
                $html .= '<script type="text/javascript" src="' . $script . '"></script>' . PHP_EOL;
            }
        }
        $attrs = $this->getFormAttributes();
        if (!is_null($this->class)) {
            $class = ' class="' . $this->class . '"';
        } else {
            $class = '';
        }
        $html .= '<form' . $class . $attrs . '>' . PHP_EOL;
        if ($this->fieldsets) {
            foreach ($this->fieldsets as $fieldset) {
                $html .= $this->renderFieldset($fieldset);
            }
        }
        foreach ($this->elements as $element) {
            $html .= $element->render();
        }
        $html .= '</form>' . PHP_EOL;
        return $html;
    }

    public function renderFieldset($fieldset) {
        $partial = '';
        if (empty($fieldset->elements)) {
            return '';
        }
        foreach ($fieldset->elements as $element) {
            if (is_a($element, 'FieldsetFormBuilder')) {
                $partial .= $this->renderFieldset($element);
            } else {
                $partial .= $element->render();
            }
        }
        $html = $fieldset->render($partial);
        return $html;
    }

    public function setDependency($name, $dependency)
    {
        $this->dependencies[$name] = $dependency;
    }

    /**
     * @todo Need to pull the Model code out of this method, this class shouldn't be instantiating objects
     * @param $name
     * @return mixed
     */
    public function getDependency($name)
    {
        if (array_key_exists($name, $this->dependencies)) {
            return $this->dependencies[$name];
        } elseif (strstr($name, 'Model')) {
            $obj = new $name(null, getDb());
        } else {
            /** this next fragment of code was an attempt to provide the Session to the form to validate the vicsrf token didn't work... */
//            if ($name === 'Session') {
//                $params = $this->getDependency('Session');
//            } else {
//                $params = NULL;
//            }
//            $obj = new $name($params);
        }
        $this->setDependency($name, $obj);
        return $obj;
    }
}
