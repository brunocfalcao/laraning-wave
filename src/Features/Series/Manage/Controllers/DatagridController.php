<?php

namespace Laraning\Wave\Features\Series\Manage\Controllers;

use App\Http\Controllers\Controller;
use Laraning\DAL\Models\Series;

class DatagridController extends Controller
{
    public function __construct()
    {
        $this->middleware('wave.auth');
    }

    public function default()
    {
        return [
            'data'       => Series::latest()->simplePaginate(5),
            'button'     => 'Create new Series',
            'icon_class' => 'fas fa-list-alt',
            'formatters' => ['pk', 'image', 'string', 'text'],
            'headers'    => ['Thumbnail', 'Title', 'Description'],
            'columns'    => ['id', 'image_path', 'title', 'description_short'],
            'routes'     => [
                'edit'      => ['name' => 'wave.series.edit', 'model_name' => 'series'],
                'create'    => ['name' => 'wave.series.create'],
            ],
        ];
    }
}
