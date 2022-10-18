<?php

/**
 * Use this to add a hidden CSRF input into a form
 * @author Chris Hubbard <chris@ibunyip.com>
 * @example examples/hiddencsrf.php
 * @package BunyipformBuilder
 */

namespace BunyipFormBuilder\elements;
use BunyipFormBuilder\ElementFormBuilder;

class HiddenCsrfFormBuilder extends ElementFormBuilder
{
    protected $error;
    public $template = 'HiddenCsrfDefaultTemplate';

}
