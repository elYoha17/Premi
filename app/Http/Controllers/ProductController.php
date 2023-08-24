<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index(): View
    {
        return view('products.index');
    }
}
