<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roomables', function (Blueprint $table) {
            $table->uuid('room_id', 36);
            $table->foreign("room_id")->references("id")->on("rooms")->onDelete("CASCADE");
            $table->uuid("roomable_id");
            $table->string("roomable_type");
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
        Schema::dropIfExists('roomables');
    }
};
