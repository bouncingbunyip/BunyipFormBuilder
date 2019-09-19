<?php

/**
 * ValidationStrategyFileExists.php
 * 
 * @version $Id: ValidationStrategyFileExists.php 303 2016-02-03 00:44:09Z chris@ourgourmetlife.com $
 * @package VirtualInvite
 * @copyright 2011-2016 Chris Hubbard
 */

/**
 * Description of ValidationStrategyFileExists
 *
 * @author Chris Hubbard <chris@ourgourmetlife.com>
 */

namespace FormBuilder;

class ValidationStrategyFileExists implements ValidationStrategyInterface {

    protected $path;
    
    public function __construct() {
    }
    
    public function test($path) {
        $this->path = $path;
        $file = PATH_TO_VI.$path['orig'];
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

?>