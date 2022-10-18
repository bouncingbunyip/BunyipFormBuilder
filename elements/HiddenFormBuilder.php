<?php

/**
 * Use this to add a hidden input into a form
 * @author Chris Hubbard <chris@ibunyip.com>
 * @example examples/hidden.php
 * @package BunyipformBuilder
 */

namespace BunyipFormBuilder\elements;
use BunyipFormBuilder\ElementFormBuilder;

class HiddenFormBuilder extends ElementFormBuilder
{
    protected $required;
    protected $autofocus;
    protected $class;
    protected $error;
    public $template = 'HiddenDefaultTemplate';

}
