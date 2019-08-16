<?php

/**
 * LoaderFormBuilder.php
 *
 * @version $Id: LoaderFormBuilder.php 303 2016-02-03 00:44:09Z chris@ourgourmetlife.com $
 * @package FormBuilder
 * @copyright 2011-2016 Chris Hubbard
 */

/**
 * Description of LoaderFormBuilder
 * @author Chris Hubbard <chris@ourgourmetlife.com>
 */
namespace FormBuilder;

class LoaderFormBuilder
{

    function __construct()
    { }
    
    /**
     * 
     * @param string $classname
     */
    public static function load($classname) {
        switch ($classname) {
            case 'FormBuilder':
            case 'FormBuilder\FormBuilder':
                $retval = 'FormBuilder/FormBuilder.php';
                break;
            case 'ElementFormBuilder':
            case 'FormBuilder\ElementFormBuilder':
                $retval = 'FormBuilder/ElementFormBuilder.php';
                break;
            case 'FieldsetFormBuilder':
            case 'FormBuilder\FieldsetFormBuilder':
                $retval = 'FormBuilder/FieldsetFormBuilder.php';
                break;
            default:
                $classname = str_replace("FormBuilder\\", '', $classname);
                if (stristr($classname, 'Decorator')) {
                    $retval =  'FormBuilder/decorators/'. $classname .'.php';
                } elseif (stristr($classname, 'Template')) {
                    $retval = 'FormBuilder/templates/'. $classname .'.php';
                } else {
//                    echo 'classname= '. $classname .'<br>';
                    $retval =  'FormBuilder/elements/'. $classname .'.php';
                }
        }
        return $retval;
    }
}
