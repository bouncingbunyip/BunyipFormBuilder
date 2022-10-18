<?php

/**
 * LoaderFormBuilder.php
 *
 * @package BunyipFormBuilder
 * @copyright 2011 - 2022 Chris Hubbard 
 */

/**
 * Description of LoaderFormBuilder
 * @deprecated This class has been replaced by Autoloader.php
 * @author Chris Hubbard <chris@ibunyip.com>
 */
namespace BunyipFormBuilder;

class LoaderFormBuilder
{
    
    /**
     * 
     * @param string $classname
     */
    public static function load($classname) {
        switch ($classname) {
            case 'BunyipFormBuilder':
            case 'FormBuilder\FormBuilder':
                $retval = 'BunyipFormBuilder/BunyipFormBuilder.php';
                break;
            case 'ElementFormBuilder':
            case 'FormBuilder\ElementFormBuilder':
                $retval = 'BunyipFormBuilder/ElementFormBuilder.php';
                break;
            case 'FieldsetFormBuilder':
            case 'FormBuilder\FieldsetFormBuilder':
                $retval = 'BunyipFormBuilder/FieldsetFormBuilder.php';
                break;
            case 'FormBuilder\Validator':
                $retval = 'BunyipFormBuilder/Validator.php';
                break;
            case 'FormBuilder\ValidationResults':
                $retval = 'BunyipFormBuilder/ValidationResults.php';
                break;
            default:
                $classname = str_replace("BunyipFormBuilder\\", '', $classname);
                if (stristr($classname, 'Decorator')) {
                    $retval =  'BunyipFormBuilder/decorators/'. $classname .'.php';
                } elseif (stristr($classname, 'Template')) {
                    $retval = 'BunyipFormBuilder/templates/'. $classname .'.php';
                } elseif (stristr($classname, 'ValidationStrategy')) {
                    $retval = 'BunyipFormBuilder/'. $classname .'.php';
                } else {
//                    echo 'classname= '. $classname .'<br>';
                    $retval =  'BunyipFormBuilder/elements/'. $classname .'.php';
                }
        }
        return $retval;
    }
}
