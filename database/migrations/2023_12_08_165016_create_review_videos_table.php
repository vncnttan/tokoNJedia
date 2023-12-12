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
        Schema::create('review_videos', function (Blueprint $table) {
            $table->uuid('id');
            $table->uuid('review_id');
            $table->string('video');
            $table->timestamp('created_at');
            $table->timestamp('updated_at')->nullable();
            $table->foreign('review_id')->references('id')->on('reviews')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('review_videos');
    }
};
