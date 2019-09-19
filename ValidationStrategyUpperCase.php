<?php

/**
 * ValidationStrategyMixedCase.php
 * 
 * @version $Id: ValidationStrategyUpperCase.php 303 2016-02-03 00:44:09Z chris@ourgourmetlife.com $
 * @package VirtualInvite
 * @copyright 2011-2016 Chris Hubbard
 */

/**
 * Description of ValidationStrategyMixedCase
 *
 * @author Chris Hubbard <chris@ourgourmetlife.com>
 */

namespace FormBuilder;

class ValidationStrategyUpperCase implements ValidationStrategyInterface {
    
    protected $count; // min count of Upper case letters
    
    public function __construct($count) {
        $this->count = $count; 
    }
    
    public function test($data) {
        preg_match_all('/[A-Z]/', $data, $matches);
        $count = count($matches[0]);
        if ($count >= $this->count) {
            return true;
        } else {
            return false;
        }
    }
    
    public function getMessage() {
        return 'Must contain at least '. $this->count .' upper case characters';
    }
}

?>
