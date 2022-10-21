<?php

/**
 * Use this to add a reset button into a form
 * @author Chris Hubbard <chris@ibunyip.com>
 * @example examples/submit.php
 * @package BunyipformBuilder
 */

namespace BunyipFormBuilder\elements;
use BunyipFormBuilder\ElementFormBuilder;

class ResetFormBuilder extends ElementFormBuilder
{
    protected $class;
    public $template = 'ResetDefaultTemplate';
}
