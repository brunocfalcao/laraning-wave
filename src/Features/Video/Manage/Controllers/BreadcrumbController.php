<?php

namespace Laraning\Wave\Features\Video\Manage\Controllers;

use App\Http\Controllers\Controller;
use Laraning\DAL\Models\Video;

class BreadcrumbController extends Controller
{
    public function default()
    {
        return array('breadcrumbs' => [
                    ['link' => route('wave.videos.index'), 'caption' => 'Videos'],
                    ['caption' => 'Manage'],
            ]);
    }

    public function create()
    {
        return array('breadcrumbs' => [
                    ['link' => route('wave.videos.index'), 'caption' => 'Videos'],
                    ['caption' => 'Create'],
            ]);
    }

    public function edit(Video $video)
    {
        return array('breadcrumbs' => [
                    ['link' => route('wave.videos.index'), 'caption' => 'Videos'],
                    ['caption' => 'Edit'],
                    ['caption' => $video->title],
            ]);
    }
}
