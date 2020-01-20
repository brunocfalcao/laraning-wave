<?php

namespace Laraning\Wave\Features\Series\Manage\Controllers;

use App\Http\Controllers\Controller;
use Laraning\DAL\Models\Series;

class BreadcrumbController extends Controller
{
    public function default()
    {
        return ['breadcrumbs' => [
                    ['link' => route('wave.series.index'), 'caption' => 'Series'],
                    ['caption' => 'Manage'],
            ]];
    }

    public function create()
    {
        return ['breadcrumbs' => [
                    ['link' => route('wave.series.index'), 'caption' => 'Series'],
                    ['caption' => 'Create'],
            ]];
    }

    public function edit(Series $series)
    {
        return ['breadcrumbs' => [
                    ['link' => route('wave.series.index'), 'caption' => 'Series'],
                    ['caption' => 'Edit'],
                    ['caption' => $series->title],
            ]];
    }
}
