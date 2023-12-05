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
        Schema::create('carts', function (Blueprint $table) {
            $table->uuid("user_id", 36);
            $table->uuid("variant_id", 36);
            $table->uuid("product_id", 36);
            $table->integer('quantity');
            $table->timestamps();
            $table->foreign("user_id")->references("id")->on("users")->onUpdate("CASCADE")->onDelete("CASCADE");
            $table->foreign("variant_id")->references("id")->on("product_variants")->onUpdate("CASCADE")->onDelete("CASCADE");
            $table->foreign("product_id")->references("id")->on("products")->onUpdate("CASCADE")->onDelete("CASCADE");
            $table->primary(["user_id", "product_id", "variant_id"], "carts_primary_key");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carts');
    }
};
