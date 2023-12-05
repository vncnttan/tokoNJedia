<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('id')->default(DB::raw('(UUID())'))->primary();
            $table->string('username')->default(fake()->name());
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->string('phone')->unique()->nullable();
//            $table->float("balance")->default(0);
            $table->date("dob")->nullable();
            $table->string("gender")->default("");
            $table->string("image")->default('assets/logo/user.png');
            $table->string('google_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
