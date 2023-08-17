<?php

use App\Models\User;
use App\Models\Product;
use App\Models\Inventory;
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
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Inventory::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Product::class)->constrained();
            $table->foreignIdFor(User::class)->constrained();
            $table->tinyInteger('shelf');
            $table->integer('quantity');
            $table->decimal('unit_price', 18, 0);
            $table->timestamps();

            $table->unique(['inventory_id', 'product_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stocks');
    }
};
