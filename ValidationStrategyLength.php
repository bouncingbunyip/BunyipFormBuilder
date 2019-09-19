<?php

/**
 * ValidationStrategyLength.php
 * 
 * @version $Id: ValidationStrategyLength.php 303 2016-02-03 00:44:09Z chris@ourgourmetlife.com $
 * @package VirtualInvite
 * @copyright 2011-2016 Chris Hubbard
 */

/**
 * Description of ValidationStrategyLength
 *
 * @author Chris Hubbard <chris@ourgourmetlife.com>
 */
namespace FormBuilder;

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

?>
