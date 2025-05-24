<?php

/*
|--------------------------------------------------------------------------
| Ship Helpers
|--------------------------------------------------------------------------
|
| Write only general helper functions here.
| Container specific helper functions should go into their own related Containers.
| All files under app/{section_name}/{container_name}/Helpers/ folder will be autoloaded by Apiato.
|
*/

if (!function_exists('activeGuard')) {
    /**
     * Get the current logged-in user guard.
     */
    function activeGuard(): string|null
    {
        foreach (array_keys(config('auth.guards')) as $guard) {
            if (auth()->guard($guard)->check()) {
                return $guard;
            }
        }

        return null;
    }
}

if (!function_exists('toShortName')) {

    function toShortName(string $_name, int $_length = 30): string {
        if (strlen($_name) > $_length) {
            return trim(mb_substr($_name, 0, $_length, 'UTF-8')) . '...';
        }
        return $_name;
    }
}

if (!function_exists('convertBytes')) {
    function convertBytes($bytes) {
        if ($bytes < 1024) {
            return $bytes . ' bytes';
        } elseif ($bytes < 1048576) {
            return round($bytes / 1024, 2) . ' KB';
        } else {
            return round($bytes / 1048576, 2) . ' MB';
        }
    }
}