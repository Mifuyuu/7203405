<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!function_exists('loadEnv')) {
    function loadEnv($path) {
        if (!file_exists($path)) return;
        foreach (file($path) as $line) {
            if (trim($line) === '' || str_starts_with(trim($line), '#')) continue;
            list($key, $value) = explode('=', trim($line), 2);
            $_ENV[$key] = $value;
        }
    }
}

loadEnv(__DIR__ . '/.env');
