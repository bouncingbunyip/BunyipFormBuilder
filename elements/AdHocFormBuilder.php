<?php

/**
 * Use this to add adhoc HTML into a form
 * @author Chris Hubbard <chris@ibunyip.com>
 * @example examples/adhoc.php
 * @package BunyipformBuilder
 */

namespace BunyipFormBuilder\elements;
use BunyipFormBuilder\ElementFormBuilder;

class AdHocFormBuilder extends ElementFormBuilder
{
    protected $required;
    protected $autofocus;
    protected $class;
    protected $error;
    public $template = 'AdHocTemplate';
    protected $html;

    public function getHtml() {
        return $this->html;
    }
}
