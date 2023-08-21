<?php

namespace App\Http\Controllers;

use App\Enums\Shelf;
use App\Http\Requests\StoreActivityRequest;
use App\Models\Activity;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ActivityController extends Controller
{
    public function index(): View
    {
        return view('activities.index', [
            'shelves' => Shelf::cases(),
            'activities' => Activity::orderBy('date')->orderBy('shelf')->get(),
        ]);
    }

    public function store(StoreActivityRequest $request): RedirectResponse
    {
        Activity::create($request->validated());

        return to_route('activities.index');
    }

    public function show(Activity $activity): View
    {
        return view('activities.show', [
            'activity' => $activity,
        ]);
    }
}
