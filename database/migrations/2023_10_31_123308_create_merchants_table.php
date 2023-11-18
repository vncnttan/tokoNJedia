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
            $table->string("phone");
            $table->string("status")->default("online");
            $table->string("process_time")->default("3 hours");
            $table->string("operational_time")->default("Open 24 hours");
            $table->string("banner_image");
            $table->string("description");
            $table->string("full_description");
            $table->string("image")->default("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQuCeOsmEVzu7c-75cAA_P7_dasGfgdr4bwfw&usqp=CAU");
            $table->uuid("user_id");
            $table->timestamp("created_at");
            $table->timestamp("updated_at")->nullable();
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
