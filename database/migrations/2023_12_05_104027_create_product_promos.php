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
        Schema::create('product_promos', function (Blueprint $table) {
            $table->uuid("id");
            $table->uuid("product_id");
            $table->uuid("promo_id");
            $table->integer("discount");
            $table->timestamps();
            $table->foreign("promo_id")->references("id")->on("promos")->onUpdate("CASCADE")->onDelete("CASCADE");
            $table->foreign("product_id")->references("id")->on("products")->onUpdate("CASCADE")->onDelete("CASCADE");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_promos');
    }
};
