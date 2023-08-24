<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Http\Controllers\Controller;

class ActivityController extends Controller
{
    public function index(): View
    {
        return view('activities.index');
    }
}
