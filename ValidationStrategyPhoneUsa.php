<?php

/**
 * ValidationStrategyPhoneUsa.php
 * 
 * @package BunyipFormBuilder
 * @copyright 2011 - 2022 Chris Hubbard 
 */

/**
 * Description of ValidationStrategyPhoneUsa
 *
 * @author Chris Hubbard <chris@ibunyip.com>
 */

namespace BunyipFormBuilder;

class ValidationStrategyPhoneUsa implements ValidationStrategyInterface {

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
