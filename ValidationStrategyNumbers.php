<?php

/**
 * ValidationStrategyNumbers
 * 
 * @package BunyipFormBuilder
 * @copyright 2011 - 2022 Chris Hubbard 
 */

/**
 * Description of ValidationStrategyNumbers
 *
 * @author Chris Hubbard <chris@ibunyip.com>
 */

namespace BunyipFormBuilder;

class ValidationStrategyNumbers implements ValidationStrategyInterface {
    
    protected $count;
    
    public function __construct($count) {
        $this->count = $count; 
    }

    public function test($data) {
        preg_match_all('/[0-9]/', $data, $matches);
        $count = count($matches[0]);
        if ($count >= $this->count) {
            return true;
        } else {
            return false;
        }
    }
    
    public function getMessage() {
        return 'Must contain at least '. $this->count .' numbers';
    }
}
