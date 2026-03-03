<?php
/**
 * Autoloader.php
 *
 * @author Chris Hubbard <chris@ibunyip.com>
 * @package BunyipFormBuilder
 *
 * @deprecated This custom autoloader is superseded by Composer's PSR-4 autoloader.
 *             Install via Composer and use vendor/autoload.php instead.
 *             This file is retained for backward compatibility only and will be
 *             removed in a future release.
 */
namespace BunyipFormBuilder;

/**
 * Autoloader
 *
 * @deprecated Use Composer's autoloader (vendor/autoload.php) instead.
 *             The PSR-4 mapping "BunyipFormBuilder\\" => "" is defined in composer.json.
 */
class Autoloader
{
    public static function register()
    {
        spl_autoload_register(function ($class) {

            $namespace = Autoloader::getNamespace($class);

            $file = Autoloader::findFile($namespace, $class);

            if (file_exists($file)) {
                require $file;
                //echo 'found: '. $file . '<br>';
                //return true;
            }
            //echo 'did not find: '. $file . '<br>';
            //return false;
        });
    }

    public static function getNamespace($class): string
    {
        $parts = explode('\\', $class);
        return $parts[0];
    }

    public static function findFile($namespace, $class): string
    {
        $file = str_replace($namespace.'\\', DIRECTORY_SEPARATOR, $class).'.php';
        $file = str_replace('\\', DIRECTORY_SEPARATOR, $file);
        return dirname(__FILE__) . $file;
    }
}
Autoloader::register();
