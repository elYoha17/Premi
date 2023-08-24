<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;

class ProductController extends Controller
{
    public function index(): View
    {
        return view('products.index');
    }

    public function store(StoreProductRequest $request): RedirectResponse
    {
        Product::create($request->validated());

        return back()
            ->with(['status' => 'product-created'])
            ->withInput([
                'shelf' => $request->input('shelf'),
                'launched_at' => $request->input('launched_at'),
            ]);
    }
}
