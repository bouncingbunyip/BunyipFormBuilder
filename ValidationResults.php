<?php

/**
 * ValidationResults.php
 * 
 * @package BunyipFormBuilder 
 * @copyright 2011 - 2022 Chris Hubbard 
 */

/**
 * Description of ValidationResults
 *
 * @author Chris Hubbard <chris@ibunyip.com>
 */
namespace BunyipFormBuilder;

class ValidationResults {

    public $fields = [];
    public $post = array();

    public function __construct($post = null) {
        if (!is_null($post)) {
            $this->post = $post;
        }
    }

    /**
     * setPost
     * passes the content of the _POST to the class as a convenience
     * @param array $post 
     */
    public function setPost($post) {
        $this->post = $post;
    }

    public function fail($field, $message) {
        $this->fields[$field][] = $message;
    }

    public function getFails() {
        return $this->fields;
    }

    /**
     * getFail
     * If there's a fail on a specific field, use this to find out what happened.
     * @param string $field The name of the form field
     * @param boolean $to_string
     * @return mixed
     */
    public function getFail($field, $to_string = true) {
        if (!empty($this->fields[$field])) {
            if ($to_string) {
                return implode(', ', $this->fields[$field]);
            } else {
                return $this->fields[$field];
            }
        } else {
            return false;
        }
    }

    /**
     * isValid
     * Use this method to check to see if a form has passed its validation
     * @return boolean
     */
    public function isValid() {
        if (!($this->fields)) {
            return true;
        } else {
            return false;
        }
    }

    public function getPost() {
        return $this->post;
    }

}
