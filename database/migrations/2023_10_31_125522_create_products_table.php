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
        Schema::create('products', function (Blueprint $table) {
            $table->uuid('id', 36)->primary();
            $table->string("name");
            $table->string("description");
            $table->string("condition");
//            $table->integer("stock");
            $table->uuid("merchant_id");
            $table->uuid("product_category_id");
            $table->timestamps();
            $table->foreign("merchant_id")->references("id")->on("merchants")->onUpdate("CASCADE")->onDelete("CASCADE");
            $table->foreign("product_category_id")->references("id")->on("product_categories")->onUpdate("CASCADE")->onDelete("CASCADE");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
