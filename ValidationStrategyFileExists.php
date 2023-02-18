<?php

/**
 * ValidationStrategyFileExists.php
 * 
 * @package BunyipFormBuilder
 * @copyright 2011 - 2022 Chris Hubbard 
 */

/**
 * Description of ValidationStrategyFileExists
 * @author Chris Hubbard <chris@ibunyip.com>
 */

namespace BunyipFormBuilder;

class ValidationStrategyFileExists implements ValidationStrategyInterface {

    protected $path;
    
    public function test($path) {
        $this->path = $path;
        if (file_exists($path)) {
            return true;
        } else {
            return false;
        }
    }
    
    public function getMessage() {
        return 'did not find a file located at: '. $this->path;
    }
}