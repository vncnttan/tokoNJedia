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
        Schema::create('merchants', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string("name")->unique();
            $table->uuid("location_id");
            $table->string("image")->default("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR77KAOMGgrppm3SpfPaMapQeVm06JbyiLNoA&usqp=CAU");
            $table->uuid("user_id");
            $table->timestamps();
            $table->foreign('location_id')->references('id')->on('locations')->onUpdate("CASCADE")->onDelete("CASCADE");;
            $table->foreign("user_id")->references("id")->on("users")->onUpdate("CASCADE")->onDelete("CASCADE");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('merchants');
    }
};
