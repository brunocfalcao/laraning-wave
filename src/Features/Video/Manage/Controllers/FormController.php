<?php

namespace Laraning\Wave\Features\Video\Manage\Controllers;

use Laraning\DAL\Models\Series;
use App\Http\Controllers\Controller;

class FormController extends Controller
{
    public function __construct()
    {
        $this->middleware('wave.auth');
    }

    public function default()
    {
        return [
            'series' => Series::all()->dropdownList('id', 'title'),
        ];
    }
}
