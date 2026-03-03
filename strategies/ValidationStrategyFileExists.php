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

namespace BunyipFormBuilder\strategies;

class ValidationStrategyFileExists implements ValidationStrategyInterface {

    protected $path;
    
    public function test($path) {
        //vd($path);
        $this->path = $path;
        if (file_exists($path['orig'])) {
            return true;
        } else {
            return false;
        }
    }
    
    public function getMessage() {
        return 'did not find a file located at: '. $this->path;
    }
}