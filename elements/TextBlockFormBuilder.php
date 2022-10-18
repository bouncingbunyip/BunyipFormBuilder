<?php

/**
 * Use this to add a text block into a form
 * @author Chris Hubbard <chris@ibunyip.com>
 * @example examples/textblock.php
 * @package BunyipformBuilder
 */

namespace BunyipFormBuilder\elements;
use BunyipFormBuilder\ElementFormBuilder;

class TextBlockFormBuilder extends ElementFormBuilder
{
    protected $content;
    protected $class;
    protected $error;
    public $template = 'TextBlockDefaultTemplate';

    public function getContent() {
        return $this->content;
    }
}
