<?php

namespace App\Http\Controllers;

use App\Enums\Shelf;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;

class ProductController extends Controller
{
    public function index()
    {
        return view('products.index', [
            'shelves' => Shelf::cases(),
            'products' => Product::orderBy('name')->orderBy('shelf')->get(),
        ]);
    }

    public function store(StoreProductRequest $request): RedirectResponse
    {
        Product::create($request->validated());

        return to_route('products.index')->with([
            'status' => 'product_created',
        ])->withInput([
            'shelf' => $request->input('shelf'),
            'started_at' => $request->input('started_at'),
        ]);
    }
}
