<?php

namespace App\Http\Controllers;

use App\Enums\Shelf;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request): View|RedirectResponse
    {
        if (!$request->exists('shelf')) {
            return view('products.index', [
                'products' => Product::orderBy('name')->orderBy('shelf')->get(),
            ])->with('current_shelf');
        }

        if (($shelf = Shelf::tryFrom($request->query('shelf'))) instanceof Shelf) {
            return view('products.index', [
                'products' => Product::where('shelf', $shelf->value)->orderBy('name')->get(),
            ])->with('current_shelf', $shelf);
        }
        
        return to_route('products.index');
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
