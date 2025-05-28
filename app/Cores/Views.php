<?php
namespace App\Cores;

class Views
{

    protected static $viewsPath = __DIR__.'/../Views/';
    protected static $layout;
    protected static $section = [];
    protected static $stackSection = [];

    public static function render($view, $data = [])
    {
        $path = self::$viewsPath.str_replace('.', '/', $view).'.php';
        
        if (file_exists($path)) {
            extract($data);
            ob_start();
            include $path;

            $content = ob_get_clean();

            if (self::$layout) {
                ob_start();
                include(self::$layout);
                return ob_get_clean();
            }
            
            return ob_get_clean();
        } else {
            throw new \Exception("View file not found: {$view} at {$path}");
        }
    }

    public static function extend($view)
    {
        $path = self::$viewsPath.str_replace('.', '/', $view).'.php';
        if (file_exists($path)) {
            self::$layout = $path;
        } else {
            throw new \Exception("View file not found: {$view} at {$path}");
        }
    }

    public static function startSection($name)
    {
        array_push(self::$stackSection, $name);
        ob_start();
    }

    public static function endSection(){
        $name = array_pop(self::$stackSection);
        self::$section[$name] = ob_get_clean();
    }

    public static function yieldSection($name)
    {
        echo self::$section[$name] ?? '';
    }

    public static function include($view, $data = [])
    {
        $path = self::$viewsPath.str_replace('.', '/', $view).'.php';
        
        if (file_exists($path)) {
            extract($data);
            include $path;
        } else {
            throw new \Exception("View file not found: {$view} at {$path}");
        }
    }
}