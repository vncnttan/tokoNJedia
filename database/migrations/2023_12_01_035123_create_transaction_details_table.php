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
    public function up(): void
    {
        Schema::create('transaction_details', function (Blueprint $table) {
            $table->uuid("transaction_id");
            $table->uuid("product_id");
            $table->uuid("variant_id");
            $table->integer("quantity");
            $table->integer("price");
            $table->string("status");
            $table->uuid("shipment_id")->nullable();
            $table->uuid("promo_id")->nullable();
            $table->uuid("flash_sale_id")->nullable();
            $table->integer("discount")->nullable();
            $table->integer("total_paid");
            $table->timestamps();
            $table->foreign("transaction_id")->references("id")->on("transaction_headers")->onUpdate("CASCADE")->onDelete("CASCADE");
            $table->foreign("product_id")->references("id")->on("products")->onUpdate("CASCADE")->onDelete("CASCADE");
            $table->foreign("variant_id")->references("id")->on("product_variants")->onUpdate("CASCADE")->onDelete("CASCADE");
            $table->foreign("shipment_id")->references("id")->on("shipments")->onUpdate("CASCADE")->onDelete("CASCADE");
            $table->foreign("promo_id")->references("id")->on("promos")->onUpdate("CASCADE")->onDelete("CASCADE");
            $table->foreign("flash_sale_id")->references("id")->on("flash_sale_products")->onUpdate("CASCADE")->onDelete("CASCADE");
            $table->primary(["transaction_id", "product_id", "variant_id"], "transaction_details_primary_key");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction_details');
    }
};
