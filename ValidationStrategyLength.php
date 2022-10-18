<?php

/**
 * ValidationStrategyLength.php
 * 
 * @package BunyipFormBuilder
 * @copyright 2011 - 2022 Chris Hubbard 
 */

/**
 * Description of ValidationStrategyLength
 *
 * @author Chris Hubbard <chris@ibunyip.com>
 */
namespace BunyipFormBuilder;

class ValidationStrategyLength implements ValidationStrategyInterface {

    protected $length;
    
    public function __construct($length = 1) {
        $this->length = $length;
    }
    
    public function test($data) {
        if (strlen($data) > $this->length) {
            return true;
        } else {
            return false;
        }
    }
    
    public function getMessage() {
        return 'Needs to be more than '. $this->length .' characters long';
    }
}