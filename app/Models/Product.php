<?php

namespace App\Models;

use App\Casts\NumberCast;
use App\Enums\Shelf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'shelf',
        'name',
        'default_price',
        'launched_at',
    ];

    protected $casts = [
        'shelf' => Shelf::class,
        'default_price' => NumberCast::class,
    ];
    
    protected static function booted(): void
    {
        static::saving(function (Product $product) {
            if($product->isDirty()) {
                $product->user_id = Auth::id();
            }
        });
    }
}
