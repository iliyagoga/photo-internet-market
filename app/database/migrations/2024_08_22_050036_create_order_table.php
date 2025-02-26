<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->date('start')->nullable(false);
            $table->date('stop')->nullable(false);
            $table->boolean('convoy')->nullable(false);
            $table->boolean('delivery')->nullable(false);
            $table->boolean('onlinepay')->nullable(false);
            $table->text('comment');
            $table->integer('summ')->nullable(false);
            $table->foreignIdFor(User::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order');
    }
};
