<?php

use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;

if (! function_exists('wave_resource_prefix')) {
    function wave_resource_prefix($controller)
    {
        return  [
            'index' => "wave.{$controller}.index",
            'show' => "wave.{$controller}.show",
            'create' => "wave.{$controller}.create",
            'store' => "wave.{$controller}.store",
            'edit' => "wave.{$controller}.edit",
            'update' => "wave.{$controller}.update",
            'destroy' => "wave.{$controller}.destroy",
        ];
    }
}

if (! function_exists('image')) {

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
        [$basename, $extension] = explode('.', $filename);
        if ($suffix != null) {
            $suffix = "_{$suffix}";
        }

        return "/storage/assets/{$baseFolder}/{$basename}/{$basename}{$suffix}.{$extension}";
    }
}

if (!function_exists('date_range')) {
    /**
     * Returns a days range collection between 2 Carbon dates.
     *
     * @param \Illuminate\Support\Carbon $start_date The start date.
     * @param \Illuminate\Support\Carbon $end_date   The end date.
     * @param bool                       $onKeys     Dates on the array keys.
     * @param string                     $format     Date returned format.
     *
     * @return Collection Date range collection.
     */
    function date_range(Carbon $start_date, Carbon $end_date, $onKeys = false, $format = 'Y-m-d') : Collection
    {
        $dates = [];
        $sd = $start_date->copy();
        $ed = $end_date->copy();

        for ($date = $sd; $date->lte($ed); $date->addDay()) {
            if ($onKeys) {
                $dates[$date->format($format)] = '';
            } else {
                $dates[] = $date->format($format);
            }
        }

        return collect($dates);
    }
}
