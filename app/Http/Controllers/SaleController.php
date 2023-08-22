<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function  index(Activity $activity): View
    {
        return view('activities.sales.index', [
            'activity' => $activity,
        ]);
    }
}
