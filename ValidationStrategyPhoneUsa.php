<?php

/**
 * ValidationStrategyPhoneUsa.php
 * 
 * @version $Id: ValidationStrategyPhoneUsa.php 303 2016-02-03 00:44:09Z chris@ourgourmetlife.com $
 * @package VirtualInvite
 * @copyright 2011-2016 Chris Hubbard
 */

/**
 * Description of ValidationStrategyPhoneUsa
 *
 * @author Chris Hubbard <chris@ourgourmetlife.com>
 */

namespace FormBuilder;

class ValidationStrategyPhoneUsa implements ValidationStrategyInterface {
    
    public function __construct() { }

    /**
     * test
     * first we remove non-numerics and then use a regex to test the number.
     *
     * @todo can probably use a simpler regex here
     * @param $data
     * @return bool
     */
    public function test($data) {
        $data = $this->removeInvalid($data);
        $regex = "/^[\(]?(\d{3})[\)]?[\s]?[\-]?(\d{3})[\s]?[\-]?(\d{4})[\s]?[x]?(\d*)$/";
        if (preg_match($regex, $data)) {
            return true;
        } else {
            return false;
        }
    }

    public function removeInvalid($data)
    {
        $data = preg_replace("/[^0-9]/", "", $data);
        return $data;
    }

    public function getMessage() {
        return 'Needs to be a valid US phone number.';
    }
}
