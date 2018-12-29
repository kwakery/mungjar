<?php

function isActive(string $path, string $class_name = "active") {
  return Request::path() === $path ? $class_name : "";
}

function lastModified(string $filename) {
  return date("F d, Y H:i:s", filemtime($filename));
}

if (!function_exists('endsWith')) {
    /** http://stackoverflow.com/a/834355/7794844
     * Check if string ends with input
     *
     * @param string $haystack
     * @param string $needle
     * @return boolean
     */
    function endsWith($haystack, $needle)
    {
        $length = strlen($needle);
        if ($length == 0) {
            return true;
        }

        return (substr($haystack, -$length) === $needle);
    }
}
