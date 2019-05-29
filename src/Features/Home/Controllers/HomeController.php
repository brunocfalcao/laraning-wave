<?php

namespace Laraning\Wave\Features\Home\Controllers;

use Laraning\DAL\Models\Series;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('wave.auth');
    }

    public function index()
    {
        return flame();
    }
}
