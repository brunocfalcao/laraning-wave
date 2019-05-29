<?php

namespace Laraning\Wave\Features\Video\Manage\Controllers;

use Laraning\DAL\Models\Video;
use App\Http\Controllers\Controller;
use Laraning\Wave\Requests\Video\CreatingRequest;
use Laraning\Wave\Requests\Video\UpdatingRequest;

class VideoController extends Controller
{
    public function __construct()
    {
        $this->middleware('wave.auth');
    }

    public function index()
    {
        return flame('Dataset');
    }

    public function create()
    {
        return flame('Edition');
    }

    public function store(CreatingRequest $request)
    {
        Video::create($request->all());

        return flame('Dataset', ['caption' => $request->title]);
    }

    public function show(Video $video)
    {
        return flame();
    }

    public function edit(Video $video)
    {
        return flame('Edition', ['model' => $video]);
    }

    public function update(UpdatingRequest $request, Video $video)
    {
        $video->fill($request->all());
        $video->save();

        return flame('Dataset', ['caption' => $request->title]);
    }

    public function destroy(Video $video)
    {
        //
    }
}
