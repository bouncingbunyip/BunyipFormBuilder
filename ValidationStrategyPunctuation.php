<?php

/**
 * ValidationStrategyPunctuation
 * 
 * @version $Id: ValidationStrategyPunctuation.php 303 2016-02-03 00:44:09Z chris@ourgourmetlife.com $
 * @package VirtualInvite
 * @copyright 2011-2016 Chris Hubbard
 */

/**
 * Description of ValidationStrategyPunctuation
 *
 * @author Chris Hubbard <chris@ourgourmetlife.com>
 */

namespace FormBuilder;

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
