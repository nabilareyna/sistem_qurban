<?php
if (!function_exists('asset')) {
    function asset($path = '')
    {
        // BASE_PATH di-set otomatis berdasarkan lokasi index.php
        $base = dirname($_SERVER['SCRIPT_NAME']);
        $base = rtrim($base, '/\\');

        return $base . '/assets/' . ltrim($path, '/');
    }
}
