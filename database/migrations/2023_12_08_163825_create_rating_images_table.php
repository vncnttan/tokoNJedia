<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rating_images', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('rating_id');
            $table->string('image');
            $table->timestamp('created_at');
            $table->timestamp('updated_at')->nullable();
            $table->foreign('rating_id')->references('id')->on('ratings')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rating_images');
    }
};
