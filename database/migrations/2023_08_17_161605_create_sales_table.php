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
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Activity::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(User::class)->constrained();
            $table->tinyInteger('shelf');
            $table->decimal('credits', 18, 0)->default(0);
            $table->decimal('credits_paid', 18, 0)->default(0);
            $table->decimal('remain', 18, 0);
            $table->timestamps();

            $table->unique(['activity_id', 'shelf']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
