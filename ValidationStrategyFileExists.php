<?php

/**
 * ValidationStrategyFileExists.php
 * 
 * @package BunyipFormBuilder
 * @copyright 2011 - 2022 Chris Hubbard 
 */

/**
 * Description of ValidationStrategyFileExists
 * @todo remove PATH_TO_LIB and replace with something else
 * @author Chris Hubbard <chris@ibunyip.com>
 */

namespace BunyipFormBuilder;

class ValidationStrategyFileExists implements ValidationStrategyInterface {

    protected $path;
    
    public function test($path) {
        $this->path = $path;
        $file = PATH_TO_LIB.$path['orig'];
        if (file_exists($file)) {
            return true;
        } else {
            return false;
        }
    }
    
    public function getMessage() {
        return 'did not find a file located at: '. $this->path['orig'];
    }
}