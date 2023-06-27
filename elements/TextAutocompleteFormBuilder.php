<?php

/**
 * Use this to add an autocomplete input into a form
 * @author Chris Hubbard <chris@ibunyip.com>
 * @example examples/text-autocomplete.php
 * @package BunyipformBuilder
 */

/**
 * This class accepts the additional 'autocomplete' attribute from the form
 * definition.  The autocomplete attribute is an array of key value pairs, 
 * where the key is the target in the rendered HTML where the data returned
 * by autocomplete will be put, and the value is the name of the data element
 * for example:
 *  $autoComplete = array('first_name_0_id'=>'key');
 *  will put the value of the data element 'key' into the hidden form field 
 *  with the id of 'first_name_0_id'
 * or 
 * $autoComplete = array('first_name_0_id'=>'key', 'last_name_0_id'=>'key_name');
 * will put the value of 'key' into 'first_name_0_id' and 'key_name' into 'last_name_0_id'
 */
namespace BunyipFormBuilder\elements;
use BunyipFormBuilder\ElementFormBuilder;


class TextAutocompleteFormBuilder extends ElementFormBuilder {

    protected $required;
    protected $autofocus;
    protected $class;
    protected $error;
    public $template = 'TextAutocompleteDefaultTemplate';

    /**
     * 
     */
    public function getAttributes() {
        $attrs = array();
        $req = $this->getRequired();
        if ($req) {
            array_push($attrs, $req);
        }
        $focus = $this->getAutofocus();
        if ($focus) {
            array_push($attrs, $focus);
        }
        $css = $this->getCssClass();
        if ($css) {
            array_push($attrs, $css);
        }
        return $attrs;
    }

    /**
     * getSource
     * This sets the data source for the autocomplete
     * With BunyipFormBuilder additional values are passed in the request, so the
     * default 'ajax.php' won't have them, and the request will fail.
     * @return string the name of the data source
     */
    public function getSource() {
        if (property_exists($this, 'source')) {
            return $this->source;
        } else {
            return 'ajax.php';
        }
    }

}