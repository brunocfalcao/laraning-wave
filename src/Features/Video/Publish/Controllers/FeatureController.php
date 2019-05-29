<?php

namespace Laraning\Wave\Features\Video\Publish\Controllers;

use Illuminate\Http\Request;
use Laraning\DAL\Models\Video;
use App\Http\Controllers\Controller;
use Laraning\Wave\Notifications\VideoPublished;

class FeatureController extends Controller
{
    public function __construct()
    {
        $this->middleware('wave.auth');
    }

    public function create()
    {
        return flame(['videos' => Video::notPublished()->get()->dropdownList('id', 'title', 'Select a Video')]);
    }

    public function store(Request $request)
    {
        // Publish a video for testing.
        Video::find($request->id)->publish(VideoPublished::class);
        return flame();
    }
}
