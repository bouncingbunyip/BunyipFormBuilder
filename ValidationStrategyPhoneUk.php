<?php

/**
 * ValidationStrategyPhoneUk.php
 * 
 * @package BunyipFormBuilder
 * @copyright 2011 - 2022 Chris Hubbard 
 */

/**
 * Description of ValidationStrategyPhoneUk
 *
 * @author Chris Hubbard <chris@ibunyip.com>
 */

namespace BunyipFormBuilder;

class ValidationStrategyPhoneUk implements ValidationStrategyInterface {
    
    public function __construct() { }
    
    /**
     * test
     * @todo Clean up regex.
     * @param type $data
     * @return boolean
     */
    public function test($data) {
        $string = str_replace(array('(', ')', ' '), '', $data);
        $regex = '/^\d{3,5}\s?\d{3,4}\s?\d{3,4}(\s?\#(\d{4}|\d{3}))?$/';
        if (preg_match($regex, $string)) {
            return true;
        } else {
            return false;
        }
    }
    
    public function getMessage() {
        return 'Needs to be a valid UK phone number.';
    }
}

?>
