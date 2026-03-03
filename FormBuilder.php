<?php

/**
 * BunyipFormBuilder.php
 *
 * @package BunyipFormBuilder
 * @copyright 2011-2022 Chris Hubbard
 */

/**
 * Description of BunyipFormBuilder
 * 
 * @author Chris Hubbard <chris@ibunyip.com>
 */
namespace BunyipFormBuilder;

use \BunyipFormBuilder\ValidatorResults;
use \BunyipFormBuilder\Validator;

class FormBuilder {

    protected $strict = true;
//    protected string $method = 'post';
//    protected string $action = 'index.php';
//    protected string $class = 'bunyipform';
//    protected string $autofocus = '';
//    protected string $id;
//    protected string $name;
//    protected string $acceptcharset;
//    protected string $autocomplete;
//    protected string $enctype;
//    protected string $novalidate;
    protected $fieldsets = null;
    protected array $elements = array();
    protected array $externalCss = array();
    protected array $externalJs = array();
    protected $uid = null;
    protected $uidHelper;
    protected array $dependencies = array();
    protected string $theme = '';
    protected $validator;
    const BUNYIPCSRF = 'BUNYIPCSRF';

    protected array $attributes = array(
        'accept-charset'=>null,
        'action'=>'index.php',
        'autocomplete'=>null,
        'autofocus'=>null,
        'class'=>null,
        'enctype'=>null,
        'id'=>null,
        'method'=>'post',
        'name'=>null,
        'novalidate'=>null,
        'target'=>null
    );

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
     * @param array|null $attrs An array of key->value pairs
     * @see http://www.w3schools.com/tags/tag_form.asp
     */
    public function __construct(array $attrs = null) {
//        out($attrs, false);
        if(!is_null($attrs)) {
            $this->setFormAttributes($attrs);
        }
//        out($this->attributes);
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
        $this->attributes['method'] = $method;
    }

    public function getMethod()
    {
        if (!$this->strict) {
            return $this->attributes['method'];
        } else {
            if (in_array($this->attributes['method'], array('get', 'post'))) {
                return $this->attributes['method'];
            } else {
                return 'post';
            }
        }
    }

    public function setAction($action)
    {
        $this->attributes['action'] = $action;
    }

    public function getAction()
    {
        return $this->attributes['action'];
    }

    public function setClass($class) {
        $this->attributes['class'] = $class;
    }

    public function getClass()
    {
        return $this->attributes['class'];
    }
    
    public function setAutofocus($inputname) {
        $this->attributes['autofocus'] = $inputname;
    }

    public function getAutofocus()
    {
        return $this->attributes['autofocus'];
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
     * This a fairly lame version of an uid.  Would be better to pass in a helper to make a better one.
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
     * @param object $obj Should be one of the BunyipFormBuilder element classes
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

    public function getExternalCss(): array
    {
        return array_keys(array_flip($this->externalCss));
    }

    public function getExternalJs(): array
    {
        return array_keys(array_flip($this->externalJs));
    }

    /**
     * setFormAttributes
     * 
     * @param array|null $attrs An array of key->value pairs which become the attributes of the <form> tag
     */
    public function setFormAttributes(array $attrs = null): void
    {
        if (!is_null($attrs)) {
            foreach ($attrs as $key => $value) {
                //out([$key, $value], false);
                if ($this->strict) {
                    if (array_key_exists($key, $this->attributes)) {
                        $this->attributes[$key] = $value;
                    } else {
                        //out('key: '. $key .' not in attributes', false);
                    }
                } else {
                    //array_push($this->attributes, $key);
                    $this->attributes[$key] = $value;
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
        foreach ($this->attributes as $key=>$value) {
            if (!empty($this->attributes[$key])) {
                switch ($key) {
                    case 'accept-charset':
                        $valid = array('ISO-8859-1', 'UTF-8');
                        if (!in_array($this->attributes[$key], $valid)) {
                            $this->attributes[$key] = 'UTF-8';
                        }
                        $str[] = $key . '="' . $this->attributes[$key] .'"';
                        break;
                    case 'autocomplete':
                        $valid = array('on', 'off');
                        if (!in_array($this->attributes[$key], $valid)) {
                            $this->attributes[$key] = 'off';
                        }
                        $str[] = $key . '="' . $this->attributes[$key] . '"';
                        break;
                    case 'enctype':
                        $valid = array('application/x-www-form-urlencoded', 'multipart/form-data', 'text/plain');
                        if (!in_array($this->attributes[$key], $valid)) {
                            $this->attributes[$key] = 'application/x-www-form-urlencoded';
                        }
                        $str[] = $key . '="' . $this->attributes[$key] . '"';
                        break;
                    case 'method':
                        $valid = array('get', 'post');
                        if (!in_array($this->attributes[$key], $valid)) {
                            $this->attributes[$key] = 'post';
                        }
                        $str[] = $key . '="' . $this->attributes[$key] . '"';
                        break;
                    case 'novalidate':
                        $str[] = 'novalidate';
                        break;
                    /** 
                     * @todo This does not support named framesets 
                     */
                    case 'target':
                        $valid = array('_blank', '_self', '_parent', '_top');
                        if (!in_array( $this->attributes[$key], $valid)) {
                            $this->attributes[$key] = '_self';
                        }
                        $str[] = $key . '="' . $this->attributes[$key] . '"';
                        break;
                    default:
                        $str[] = $key . '="' . $this->attributes[$key] . '"';
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
                $html .= '<script type="text/javascript" src="' . $script . '"  type="text/javascript"></script>' . PHP_EOL;
            }
        }
        $attrs = $this->getFormAttributes();

//        if (!is_null($this->attributes['class'])) {
//            $class = ' class="' . $this->attributes['class'] . '"';
//        } else {
//            $class = '';
//        }
        $html .= '<form' . $attrs . '>' . PHP_EOL;
        if ($this->fieldsets) {
            foreach ($this->fieldsets as $fieldset) {
                $html .= $this->renderFieldset($fieldset);
            }
        }
        foreach ($this->elements as $element) {

            $html .= $element->render($this->getTheme());
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
                $partial .= $element->render($this->getTheme());
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
     * getDependency
     *
     * Returns a previously registered dependency. Callers must register
     * dependencies via setDependency() before calling this method.
     * Subclasses may override this to provide their own resolution logic
     * (e.g. lazy-instantiation of framework-specific objects).
     *
     * @param string $name The dependency key used when calling setDependency().
     * @return mixed
     * @throws \RuntimeException if the dependency has not been registered.
     */
    public function getDependency($name) {
        if (!array_key_exists($name, $this->dependencies)) {
            throw new \RuntimeException(
                'No dependency registered for "' . $name . '". '
                . 'Call setDependency(\'' . $name . '\', $object) before calling getDependency().'
            );
        }
        return $this->dependencies[$name];
    }
}
