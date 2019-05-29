<?php

namespace Laraning\Wave\Features\Series\Manage\Controllers;

use Illuminate\Http\Request;
use Laraning\DAL\Models\Series;
use App\Http\Controllers\Controller;
use Laraning\Wave\Requests\Series\CreatingRequest;
use Laraning\Wave\Requests\Series\UpdatingRequest;

class SeriesController extends Controller
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
        Series::create($request->all());
        return flame('Dataset', ['caption' => $request->title]);
    }

    public function show(Series $series)
    {
        return flame();
    }

    public function edit(Series $series)
    {
        return flame('Edition', ['model' => $series]);
    }

    public function update(UpdatingRequest $request, Series $series)
    {
        $series->fill($request->all());
        $series->save();
        return flame('Dataset', ['caption' => $request->title]);
    }

    public function destroy(Series $series)
    {
        //
    }

    public function test()
    {
        return flame('Test');
    }
}
