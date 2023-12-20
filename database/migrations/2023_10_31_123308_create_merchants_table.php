e<?php

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
            $table->string("status")->default("Online");
            $table->string("catch_phrase")->default("");
            $table->string("process_time")->default("3 hours");
            $table->string("operational_time")->default("24 hours");
            $table->string("banner_image")->nullable();
            $table->string("description")->default("");
            $table->text("full_description")->default("");
            $table->string("image")->nullable();
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
