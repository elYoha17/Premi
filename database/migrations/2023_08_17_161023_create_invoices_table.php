<?php

use App\Models\User;
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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Activity::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(User::class)->constrained();
            $table->decimal('discount', 18, 0);
            $table->decimal('debts', 18, 0);
            $table->decimal('debts_paid', 18, 0);
            $table->decimal('cash', 18, 0);
            $table->timestamps();

            $table->unique('activity_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
