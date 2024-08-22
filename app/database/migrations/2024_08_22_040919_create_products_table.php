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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('model',64)->nullable(false)->unique();
            $table->text('text')->nullable(false);
            $table->integer('price_wkday')->nullable(false);;
            $table->integer('price_wend')->nullable(false);
            $table->integer('price_week')->nullable(false);
            $table->integer('price_month')->nullable(false);
            $table->boolean('stock')->nullable(false)->default(true);
            $table->text('mean_image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
