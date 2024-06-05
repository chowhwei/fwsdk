<?php

function classLoader($class): void
{
    $path = str_replace('FreeWil', 'src\\FreeWil', $class);
    $path = str_replace('\\', DIRECTORY_SEPARATOR, $path);
    $file = __DIR__ . DIRECTORY_SEPARATOR . $path . '.php';
    if (file_exists($file)) {
        require_once $file;
    } else {
        echo "File {$file} not found!";
        die();
    }
}

spl_autoload_register('classLoader');