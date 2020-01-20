<?php

namespace Laraning\Wave\Features\Home\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Laraning\DAL\Models\User;

class CardSimpleController extends Controller
{
    public function index()
    {
        $interval = 7;
        $start = Carbon::now(config('app.timezone'))->subDay($interval);
        $end = Carbon::now(config('app.timezone'))->subDay(1);

        // Get users from the last 7 days grouped by day.
        $results = DB::table('users')
                       ->select(DB::raw('count(1) as total'), DB::raw('date(created_at) as date'))
                       ->whereBetween(DB::raw('date(created_at)'), [$start->format('Y-m-d'), $end->format('Y-m-d')])
                       ->groupBy('date')
                       ->orderBy('created_at')
                       ->get()
                       ->pluck('total', 'date');

        // Create dates collection (keys = dates).
        $segment = date_range($start, $end, true);
        $totals = [];

        // Populate dateRange collection with the values from the results.
        $segment->transform(function ($item, $key) use ($results) {
            return ! is_null($results->get($key)) ? $results->get($key) : 0;
        });

        // Create final date segment on $total
        $segment->each(function ($item, $key) use (&$totals) {
            $totals[Carbon::createFromFormat('Y-m-d', $key)->format('jS M')] = $item;
        });

        // Extract to simple variables.
        $labels = collect($totals)->keys()->toArray();
        $values = collect($totals)->values()->toArray();

        return ['title' => 'Total Users',
            'total' => User::all()->count(),
            'class' => 'fa fa-users',
            'labels' => $labels,
            'values' => $values, ];
    }
}
