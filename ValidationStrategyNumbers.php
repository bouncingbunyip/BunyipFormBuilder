<?php

/**
 * ValidationStrategyNumbers
 * 
 * @version $Id: ValidationStrategyNumbers.php 303 2016-02-03 00:44:09Z chris@ourgourmetlife.com $
 * @package VirtualInvite
 * @copyright 2011-2016 Chris Hubbard
 */

/**
 * Description of ValidationStrategyNumbers
 *
 * @author Chris Hubbard <chris@ourgourmetlife.com>
 */

namespace FormBuilder;

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

?>
