<?php
    function __autoload($class) {
        $path = __DIR__ . '/' . str_replace('\\', '/', $class) . '.php';

        include_once $path;
    }

    // Root directory of the app
    define('ROOT', __DIR__ . '/');

    // Arguments to list or recover backups
    $args = array_values(array_filter(array_slice($_SERVER['argv'], 1)));
    $core = \Lib\Classes\Core::getInstance();

    // Run core class
    $core->run($args);
?>
