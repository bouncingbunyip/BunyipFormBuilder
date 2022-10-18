<?php

/**
 * ValidationStrategyInterface.php
 * 
 * @package BunyipFormBuilder
 * @copyright 2011 - 2022 Chris Hubbard 
 */

/**
 * Description of ValidationStrategyInterface
 *
 * @author Chris Hubbard <chris@ibunyip.com>
 */

namespace BunyipFormBuilder;

interface ValidationStrategyInterface {
    
    public function test($data); 
    
    public function getMessage();
}
