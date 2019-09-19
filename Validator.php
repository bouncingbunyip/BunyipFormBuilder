<?php

/**
 * Validator.php
 * 
 * @version $Id: Validator.php 314 2016-02-19 17:37:02Z chris@ourgourmetlife.com $
 * @package VirtualInvite 
 * @copyright 2011-2016 Chris Hubbard 
 */

/**
 * Description of Validator
 *
 * The isValid* methods validate generic data types.
 * The validate* methods validate application specific data types.
 * 
 * @author Chris Hubbard <chris@ourgourmetlife.com>
 */
namespace FormBuilder;

include_once 'ValidationStrategyInterface.php';

class Validator {

    public $fails = false;
    public $strategies;
    protected $results;

    public function setValidationResults(ValidationResults $results) {
        $this->results = $results;
    }

    public function getValidationResults() {
        return $this->results;
    }

    public function isValidEmail($email) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) { 
            return true;
        } else {
            $this->fails['email'][] = 'Invalid email address';
            return false; 
        } 
    }
    
    public function isValidPhone($data) {
        if (empty($this->strategies['phone'])) {
            $this->attach(new \FormBuilder\ValidationStrategyPhoneUsa, 'phone');
        }
        foreach ($this->strategies['phone'] as $strategy) {
            if (!$strategy->test($data)) {
                $this->fails['phone'][] = $strategy->getMessage();
            }
        }
        if (isset($this->fails['phone'])) {
            return false;
        } else {
            return true;
        }
    }
    
    public function isValidNumber($number) {
        if ((filter_var($number, FILTER_VALIDATE_INT)) || (filter_var($number, FILTER_VALIDATE_FLOAT))) {
            return true;
        } else {
            $this->fails['number'][] = 'Invalid number or float';
            return false;
        }
    }
    
    /**
     * isValidDate
     * 
     * @param string $date The date that we are validating
     * @param boolean $in_future  Checks to see if the date is in the future
     * @return boolean 
     */
    public function isValidDate($date, $in_future = false) {
        $dt = new ViDateTime($date);
        if ($dt->date) {
            $retval = true;
        } else {
            $this->fails['date'][] = 'Invalid date';
            $retval = false;
        }
        if ($in_future) {
            $today = new ViDateTime();
            if ($dt < $today) {
                $this->fails['date'][] = 'Date is not in the future';
                $retval = false;
            }
        }
        return $retval;
    }



    /**
     * validateZipcode
     * if the zipcode is a US one, validate it, otherwise just accept it.
     * 
     * @todo At some point consider expanding validation to include other countries
     * 
     * @param string $zip the zip or postal code we are testing
     * @param string $countrycode the ISO value for a country
     * @return boolean
     */
    public function validateZipcode($zip, $countrycode = 'US') {
        if ($countrycode == 'US') {
            $rs = preg_match('/^[0-9]{5}([- ]?[0-9]{4})?$/', $zip);
            if ($rs) {
                return true;
            } else {
                $this->fails['validateZipcode'] = 'not a valid US zipcode';
                return false;
            }
        } else {
            return true;
        }
    }

    /**
     * isValidName
     * Should allow names like:
     * First
     * FirstName LastName
     * FirstName M Lastname 
     * FirstName M. Lastname
     * FirstName LastName Jr
     * FirstName LastName Jr.
     */
    public function isValidName($data)
    {
        if (is_null($data)) {
            $this->fails['validName'] = 'name is null';
            return false;
        }
        if (is_array($data)) {
            $data = implode(' ', $data);
        }

        $data = trim(str_replace('.', '', $data));
        
        if((strlen($data) < 1) || (strlen($data) > 50)) {
            // wrong length
            $this->fails['validName'] = 'name is too short or too long';
            return false;
        }
        if (ctype_alnum(str_replace(' ', '', $data))) {
            return true;
        }else{
            $this->fails['validName'] = 'did not pass ctype_alnum';
            return false;
        }
    }
    
    /**
     * isValidImagePath 
     * In this case, the path will be something like: 'upload/events/loretta.png'
     * And we want to ensure that this points to an actual image
     * @return boolean
     */
    public function isValidImagePath($path) {
        if (is_null($path)) {
            return false;
        }
        $image_extensions = array('jpg', 'jpeg', 'gif', 'png');
        $pathinfo = pathinfo($path);
        $pathinfo['orig'] = $path;
        if (!in_array($pathinfo['extension'], $image_extensions)) {
            $this->fails['imagepath'][] = 'invalid image type, expecting one of: jpg, jpeg, gif, png';
            return false;
        }
        if (!empty($this->strategies['imagepath'])) {
            foreach ($this->strategies['imagepath'] as $strategy) {
                if (!$strategy->test($pathinfo)) {
                    $this->fails['imagepath'][] = $strategy->getMessage();
                }
            }
        }
        if (!empty($this->fails['imagepath'])) {
            return false;
        } else {
            return true;
        }        
    }
    
    /**
     * isStrongPassword
     * The code that calls this method is responsible for setting the whichever validatation strategies are required.
     * Otherwise defaults to a 8 character count.
     * 
     * @param string $password The password to test
     * @return boolean Return true if we consider the password strong, otherwise return false
     */
    public function isStrongPassword($password) {
        if (!empty($this->strategies['password'])) {
            foreach ($this->strategies['password'] as $strategy) {
                if (!$strategy->test($password)) {
                    $this->fails['password'][] = $strategy->getMessage();
                }
            }
            if ($this->fails) {
                return false;
            }
        } else {
            if (strlen($password) < 8) {
                return false;
            }
        }
    	return true;
    }
    
    public function attach(ValidationStrategyInterface $strategy, $context) {
        if (isset($this->strategies[$context])) {
            array_push($this->strategies[$context], $strategy);
        } else {
            $this->strategies[$context][] = $strategy;
        }
    }
    
    public function getFails($name = null) {
        if (isset($this->fails[$name])) {
            return $this->fails[$name];
        } else {
            return $this->fails;
        }
    }

    public function validateWith($context, $data) {

        if (!empty($this->strategies[$context])) {
            foreach ($this->strategies[$context] as $strategy) {
                if (!$strategy->test($data)) {
                    $this->fails[$context][] = $strategy->getMessage();
                }
            }
            if ($this->fails) {
                return false;
            }
        } else {
            return false;
        }
        return true;
    }
}