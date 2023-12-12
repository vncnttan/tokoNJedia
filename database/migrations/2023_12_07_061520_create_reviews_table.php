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
        Schema::create('reviews', function (Blueprint $table) {
            $table->uuid('id', 36)->primary();
            $table->uuid("user_id");
            $table->uuid("transaction_id");
            $table->string('variant_bought');
            $table->uuid('product_id');
            $table->integer("review");
            $table->string("message");
            $table->timestamps();
            $table->foreign("product_id")->references("id")->on("products")->onUpdate("CASCADE")->onDelete("CASCADE");
            $table->foreign("user_id")->references("id")->on("users")->onUpdate("CASCADE")->onDelete("CASCADE");
            $table->foreign("transaction_id")->references("id")->on("transaction_headers")->onUpdate("CASCADE")->onDelete("CASCADE");
//            $table->foreign("variant_id")->references("id")->on("product_variants")->onUpdate("CASCADE")->onDelete("CASCADE");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
};
