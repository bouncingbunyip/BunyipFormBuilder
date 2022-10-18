<?php

/**
 *
 * @author jackal
 *        
 */
namespace BunyipFormBuilder\elements;
use BunyipFormBuilder\ElementFormBuilder;

class TextareaFormBuilder extends ElementFormBuilder
{
    public $template = 'TextareaDefaultTemplate';
    
    public function getRows() {
        if (!empty($this->rows)) {
            return $this->rows;
        }
        return false;
    }

    public function getCols() {
        if (!empty($this->cols)) {
            return $this->cols;
        }
        return false;
    }
    
    /**
     * 
     */
    public function getAttributes() {
        $attrs = array();
        $rows = $this->getRows();
        if ($rows) {
            array_push($attrs, 'rows="'. $rows .'"');
        }
        $cols = $this->getCols();
        if ($cols) {
            array_push($attrs, 'cols="'. $cols .'"');
        }
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
