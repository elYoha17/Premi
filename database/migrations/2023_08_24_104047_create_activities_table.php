<?php

use App\Models\User;
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
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained();
            $table->unsignedTinyInteger('shelf');
            $table->date('date');
            $table->decimal('discount', 18, 0)->default(0);
            $table->decimal('debts', 18, 0)->default(0);
            $table->decimal('debts_paid', 18, 0)->default(0);
            $table->decimal('cash_used', 18, 0)->default(0);
            $table->decimal('credits', 18, 0)->default(0);
            $table->decimal('credits_paid', 18, 0)->default(0);
            $table->decimal('cash', 18, 0)->default(0);
            $table->timestamps();

            $table->unique(['shelf', 'date']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};
