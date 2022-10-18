<?php

/**
 * ValidationStrategyPunctuation
 * 
 * @package BunyipFormBuilder
 * @copyright 2011 - 2022 Chris Hubbard 
 */

/**
 * Description of ValidationStrategyPunctuation
 *
 * @author Chris Hubbard <chris@ibunyip.com>
 */

namespace BunyipFormBuilder;

class ValidationStrategyPunctuation implements ValidationStrategyInterface {
    
    protected $count;
    
    public function __construct($count) {
        $this->count = $count; 
    }

    /**
     * should find any of these characters: ! ' # S % & ' ( ) * + , - . / : ; < = > ? @ [ / ] ^ _ { | } ~
     * @param $data
     * @return bool
     */
    public function test($data) {
        preg_match_all('/[[:punct:]]/', $data, $matches);
        $count = count($matches[0]);
        if ($count >= $this->count) {
            return true;
        } else {
            return false;
        }
    }
    
    public function getMessage() {
        return 'Must contain at least '. $this->count .' punctuation symbols';
    }
}

?>
