<?php

namespace App\Models;

use App\Enums\Shelf;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'shelf',
        'default_price',
        'started_at',
    ];

    protected $casts = [
        'shelf' => Shelf::class,
    ];

    protected static function booted(): void
    {
        static::saving(function (Product $product) {
            $product->user_id = Auth::id();
        });
    }
}
