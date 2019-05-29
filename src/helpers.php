<?php

if (!function_exists('wave_resource_prefix')) {
    function wave_resource_prefix($controller)
    {
        return  [
            'index' => "wave.{$controller}.index",
            'show' => "wave.{$controller}.show",
            'create' => "wave.{$controller}.create",
            'store' => "wave.{$controller}.store",
            'edit' => "wave.{$controller}.edit",
            'update' => "wave.{$controller}.update",
            'destroy' => "wave.{$controller}.destroy"
        ];
    }
};

if (!function_exists('image')) {

    /**
     * Returns an URL for a model image filename.
     * To be mostly used in the Laraning views.
     * @param  string      $filename The model filename.
     * @param  string|null $suffix   The filename suffix.
     * @return string                The URL.
     */
    function image(string $filename, string $suffix = null, string $baseFolder = 'wave/images')
    {
        // Needs to search for the right image, given the respective extension.
        list($basename, $extension) = explode('.', $filename);
        if ($suffix != null) {
            $suffix = "_{$suffix}";
        }

        return "/storage/assets/{$baseFolder}/{$basename}/{$basename}{$suffix}.{$extension}";
    }
}
