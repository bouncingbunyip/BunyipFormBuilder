<?php

/**
 * Use this to add a submit button into a form
 * @author Chris Hubbard <chris@ibunyip.com>
 * @example examples/submit.php
 * @package BunyipformBuilder
 */

namespace BunyipFormBuilder\elements;
use BunyipFormBuilder\ElementFormBuilder;

class SubmitFormBuilder extends ElementFormBuilder
{
    protected $autofocus;
    protected $class;
    protected $error;
    public $template = 'SubmitDefaultTemplate';

}
