<?php

/**
 * Use this to add a button into a form
 * @author Chris Hubbard <chris@ibunyip.com>
 * @example examples/button.php
 * @package BunyipformBuilder
 */

namespace BunyipFormBuilder\elements;
use BunyipFormBuilder\ElementFormBuilder;

class ButtonFormBuilder extends ElementFormBuilder
{
    protected $autofocus;
    protected $class;
    protected $error;
    public $onclick = null;
    public $template = 'ButtonDefaultTemplate';

    public function getOnClick() {
        if (!empty($this->onclick)) {
            return $this->onclick;
        } else {
            return false;
        }
    }
}
