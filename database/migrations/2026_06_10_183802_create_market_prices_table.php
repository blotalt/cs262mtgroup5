<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up(): void
{
    Schema::create('market_prices', function (Blueprint $table) {
        $table->id();
        $table->string('rice_variety');
        $table->string('rice_type');
        $table->string('province');
        $table->string('market');
        $table->decimal('price_per_kg', 8, 2);
        $table->decimal('change_percent', 5, 2)->default(0);
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('market_prices');
    }
};
