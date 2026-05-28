<?php

/**
 * Use this to add a date input with an inline delete button into a form.
 * Mirrors TextDeleteFormBuilder but renders <input type="date">.
 * @author Chris Hubbard <chris@ibunyip.com>
 * @package BunyipformBuilder
 */

namespace BunyipFormBuilder\elements;
use BunyipFormBuilder\ElementFormBuilder;

class DateDeleteFormBuilder extends ElementFormBuilder
{
    protected $autofocus;
    protected $action;
    protected $deleteId;
    protected $class;
    protected $error;
    public $template = 'DateDeleteSubFormTemplate';
    protected $method;
    protected $form_name;

    public function getAction()
    {
        return $this->action;
    }

    public function getMethod()
    {
        if (is_null($this->method)) {
            return 'POST';
        }
        if (!(in_array(strtolower($this->method), array('get', 'post')))) {
            return 'POST';
        }
        return strtoupper($this->method);
    }

    public function getDeleteId()
    {
        return $this->deleteId;
    }

    public function getFormName()
    {
        return $this->form_name;
    }
}
