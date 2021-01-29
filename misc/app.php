<?php
namespace misc;

class App
{
    public static $db;
    public static $app_dir;
    public static $app_url;

    public function __construct($config)
    {
        foreach ($config as $k => $v) {
            self::${$k} = $v;
        }
        self::$db = Database::connect($config['db']);
    }

    public function render($view, $params)
    {
        // Load view file
        $view_file = self::$app_dir . 'views' . DIRECTORY_SEPARATOR . $view . '.php';
        if (is_file($view_file)) {
            ob_start();
            // Fill all $params as vars
            foreach ($params as $key => $value) {
                ${$key} = $value;
            }
            include $view_file;
            $content = ob_get_clean();
            include self::$app_dir . 'views/layout.php';
        } else {
            echo "No file " . $view_file;
        }
    }


    public static function renderPart($view, $data)
    {
        // Load view file
        $view_file = self::$app_dir . 'views' . DIRECTORY_SEPARATOR . $view . '.php';
        if (is_file($view_file)) {
            ob_start();
            // Fill all $params as vars
            foreach ($data as $key => $value) {
                ${$key} = $value;
            }
            include $view_file;
            $content = ob_get_clean();
            return $content;
        } else {
            echo "No file " . $view_file;
        }
    }

    public static function renderHeader($buttons)
    {
        ob_start();
        // Render header
        include 'views/header.php';
        $header = ob_get_clean();
        return $header;
    }
}