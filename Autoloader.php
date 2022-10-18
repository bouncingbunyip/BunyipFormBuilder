<?php
/**
 * Autoloader.php
 *
 * @author Chris Hubbard <chris@ibunyip.com>
 * @package BunyipFormBuilder
 */

/**
 * Autoloader
 *
 * A simple, basic autoloader to load the various classes used in BunyipFormBuilder
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
                return true;
            }
            //echo 'did not find: '. $file . '<br>';
            return false;
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
