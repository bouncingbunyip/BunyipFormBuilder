<?php

/**
 * This is the template for the AdHocFormBuilder.
 * @author Chris Hubbard <chris@ibunyip.com>
 * @package BunyipformBuilder
 */

namespace BunyipFormBuilder\templates;

class AdHocTemplate
{

    public function __construct() {

    }
    
    /**
     * getHtml
     */
    function getHtml($elem) {
        return $elem->getHtml();
    }
}