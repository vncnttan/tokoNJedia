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
        Schema::create('messages', function (Blueprint $table) {
            $table->uuid('id', 36)->primary();
            $table->string("message");
            $table->uuid("room_id");
            $table->uuid('messageable_id');
            $table->string('messageable_type');
            $table->timestamp("read_at")->nullable();
            $table->timestamps();
            $table->foreign("room_id")->references("id")->on("rooms")->onUpdate("CASCADE")->onDelete("CASCADE");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
};
