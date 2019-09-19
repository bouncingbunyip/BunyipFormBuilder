<?php

/**
 * ValidationStrategyInterface.php
 * 
 * @version $Id: ValidationStrategyInterface.php 303 2016-02-03 00:44:09Z chris@ourgourmetlife.com $
 * @package VirtualInvite
 * @copyright 2011-2016 Chris Hubbard
 */

/**
 * Description of ValidationStrategyInterface
 *
 * @author Chris Hubbard <chris@ourgourmetlife.com>
 */

namespace FormBuilder;

interface ValidationStrategyInterface {
    
    public function test($data); 
    
    public function getMessage();
}

?>
