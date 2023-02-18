<?php

/**
 *
 * @author Chris Hubbard <chris@ibunyip.com>
 *        
 * This class and the corresponding template can be used to create a 'tag it' input.
 * @see http://aehlke.github.io/tag-it/
 * 
 */
namespace BunyipFormBuilder;

class TextTagItFormBuilder extends ElementFormBuilder
{
    protected $required;
    protected $autofocus;
    protected $class;
    protected $error;
    public $template = 'TextTagItTemplate';
    
    
    /**
     * getOptions
     * Use this method to get (as HTML) the various options that are set for the Tag-It builder
     * 
     */
    public function getOptions() {
        $options = array('fieldName', 'availableTags', 'autocomplete', 'showAutocompleteOnFocus', 'removeConfirmation', 'caseSensitive', 'allowDuplicates', 'allowSpaces', 'readOnly', 'tagLimit', 'singleField', 'singleFieldDelimiter', 'singleFieldNode', 'tabIndex', 'placeholderText');
        $opts = array();
        foreach ($options as $option) {
            if (isset($this->options[$option]) && !empty($this->options[$option])) {
//                 switch ($option) {
//                     case ''
//                 }
                $opts[] .= "            ". $option .": ". $this->options[$option];
            }
        }
        $retval = implode(",\n", $opts);
        return $retval;
    }
    
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
}
