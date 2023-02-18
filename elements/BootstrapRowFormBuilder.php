<?php

/**
 *
 * @author Chris Hubbard <chris@ibunyip.com>
 *        
 */
namespace BunyipFormBuilder;

class BootstrapRowFormBuilder extends ElementFormBuilder
{
    protected $required;
    protected $autofocus;
    protected $class;
    protected $error;
    public $template = 'BootstrapRowTemplate';

    public function __construct($elements = null)
    {
        $this->formRowElements = $elements;
        //parent::__construct($attrs);

    }

    public function render() {
        $html= '<div class="form-row">'. PHP_EOL;
        foreach ($this->formRowElements['elems'] as $elem) {
            $html .= $elem->render();
        }
        $html .= '</div>'. PHP_EOL;
        return $html;
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
