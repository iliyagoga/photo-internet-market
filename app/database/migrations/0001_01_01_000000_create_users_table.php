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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('r_name',32)->nullable(false);
            $table->string('sername',32)->nullable(false);
            $table->string('patronymic',32)->nullable(false);
            $table->string('s_sername',32)->nullable();
            $table->string('email')->nullable(false)->unique();
            $table->date('birthday')->nullable(false);
            $table->bigInteger('phone')->nullable(false)->unique();
            $table->bigInteger('s_phone')->nullable(false);
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('users_private_info', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('passport')->nullable(false)->unique();
            $table->date('take_date')->nullable(false);
            $table->string('residence_address')->nullable(false);
            $table->string('live_address')->nullable(false);
            $table->string('taker')->nullable(false);
            $table->string('company_name',64)->nullable(false);
            $table->string('post',32)->nullable(false);
            $table->bigInteger('w_phone')->nullable(false)->unique();
            $table->string('from');
            $table->string('witness');
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
