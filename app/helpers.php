<?php

if (!function_exists('appTitle')) {
    function appTitle(?string $title = null)
    {
        return !empty($title) ? $title . ' | ' . config('app.name') : config('app.name');
    }
}
