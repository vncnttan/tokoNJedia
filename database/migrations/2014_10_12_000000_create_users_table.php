<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('id', 36)->default(DB::raw('(UUID())'))->primary();
            $table->string('username')->default("No username");
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->string('phone')->unique()->nullable(true);
            $table->float("balance")->default(0);
            $table->date("dob")->nullable(true);
            $table->string("gender")->default("");
            $table->string("image")->default("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTeMIAx7-Zgl6AdkUXBXZydQPW0EyvuyxAI5w&usqp=CAU");
            $table->string('google_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
