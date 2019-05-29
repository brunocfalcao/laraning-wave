<?php

namespace Laraning\Wave\Controllers;

use App\Http\Controllers\Controller;
use Laraning\DAL\Services\ImageServices;

class Wysiwyg extends Controller
{
    public function __construct()
    {
        $this->middleware('wave.auth');
    }

    public function uploadFile()
    {
        $conditions = collect([
            request()->hasFile('file'),
            request()->has('_token'),
            request()->has('id')
        ]);

        if (!$conditions->are(true)) {
            return response()->json(['error' =>'No file uploaded. Conditions not met.']);
        }

        $path = public_path('storage/assets/wave/wysiwyg');
        request()->file('file')->retina()->save(null, $path);
        $filename = request()->file('file')->filename();

        return response()->json(['link' => url(image($filename, null, 'wave/wysiwyg'))]);
    }
}
