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
    public $type = 'button';
    public $template = 'ButtonTemplate';
    public $attributes = [];

    public function getOnClick(): string|false {
        return !empty($this->onclick) ? $this->onclick : false;
    }

    public function getType(): string {
        return $this->type;
    }

    /**
     * Returns extra HTML attributes as an array of pre-rendered strings,
     * e.g. ['disabled', 'data-bs-toggle="modal"'].
     */
    public function getAttributes(): array|false {
        return !empty($this->attributes) ? $this->attributes : false;
    }
}
