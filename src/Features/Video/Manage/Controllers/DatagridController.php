<?php

namespace Laraning\Wave\Features\Video\Manage\Controllers;

use App\Http\Controllers\Controller;
use Laraning\DAL\Models\Video;

class DatagridController extends Controller
{
    public function __construct()
    {
        $this->middleware('wave.auth');
    }

    public function default()
    {
        return [
            'data' => Video::latest()->simplePaginate(5),
            'button' => 'Create new Video',
            'icon_class'  => 'fas fa-list-alt',
            'formatters'  => ['pk', 'image', 'string', 'text'],
            'headers'     => ['Thumbnail', 'Title', 'Description'],
            'columns'     => ['id', 'image_path', 'title', 'description_short'],
            'routes'      => [
                'edit'       => ['name' => 'wave.videos.edit', 'model_name' => 'video'],
                'create'     => ['name' => 'wave.videos.create'],
            ],
        ];
    }
}
