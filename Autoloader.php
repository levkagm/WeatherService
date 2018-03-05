<?php
namespace myNameSpace
{
    /**
     * Class Autoloader
     * @package myNameSpace
     */
    class Autoloader
    {
        /**
         * Autoloader constructor.
         */
        public function __construct(){}

        /**
         * @param $file
         */
        public static function autoload($file)
        {
            $file = str_replace('\\', '/', $file);
            $path = __DIR__;
            $filepath = __DIR__ . '/' . $file . '.php';

            if (file_exists($filepath))
            {
                require_once($filepath);
            }
            else
            {
                $flag = true;
                Autoloader::recursive_autoload($file, $path, $flag);
            }
        }

        /**
         * @param $file
         * @param $path
         * @param $flag
         */
        public static function recursive_autoload($file, $path, &$flag)
        {
            if (FALSE !== ($handle = opendir($path)) && $flag)
            {
                while (FAlSE !== ($dir = readdir($handle)) && $flag)
                {
                    if (strpos($dir, '.') === FALSE)
                    {
                        $path2 = $path .'/' . $dir;
                        $filepath = $path2 . '/' . $file . '.php';
                        if (file_exists($filepath))
                        {
                            $flag = FALSE;
                            require_once($filepath);
                            break;
                        }
                        Autoloader::recursive_autoload($file, $path2, $flag);
                    }
                }
                closedir($handle);
            }
        }
    }
  \spl_autoload_register('myNameSpace\Autoloader::autoload');
}