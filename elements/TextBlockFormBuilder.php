<?php

/**
 *
 * @author jackal
 *        
 */
namespace FormBuilder;

class TextBlockFormBuilder extends ElementFormBuilder
{
    protected $content;
    protected $class;
    protected $error;
    public $template = 'TextBlockDefaultTemplate';
    
    /**
     * 
     */
    public function getContent() {
        return $this->content;
    }
}
