<?php

use App\Models\User;
use App\Models\Product;
use App\Models\Activity;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('lost_products', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Activity::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Product::class)->constrained();
            $table->foreignIdFor(User::class)->constrained();
            $table->integer('quantity');
            $table->decimal('unit_price', 18, 0);
            $table->timestamps();

            $table->unique(['activity_id', 'product_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lost_products');
    }
};
