<?php

if(!function_exists("base_path")){
    function base_path(string $path = ''): string
    {
        return dirname(__DIR__, 2) . '/' . $path;
    }
}

if (!function_exists('mix')) {
    function mix(string $path)
    {
        if (!file_exists(base_path('public/mix-manifest.json'))) {
            throw new \Exception("mix-manifest.json not found");
        }

      $content = file_get_contents(base_path('public/mix-manifest.json'));
      $content = json_decode($content, true);

      return $content[$path] ?? '';
    }
}