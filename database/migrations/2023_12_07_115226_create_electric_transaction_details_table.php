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
        Schema::create('electric_transaction_details', function (Blueprint $table) {
            $table->uuid('transaction_id')->primary();
            $table->uuid('electric_token');
            $table->string('subscription_number');
            $table->integer('nominal');
            $table->timestamp('created_at');
            $table->timestamp('updated_at')->nullable();
            $table->foreign("transaction_id")->references("id")->on("transaction_headers")->onUpdate("CASCADE")->onDelete("CASCADE");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('electric_transaction_details');
    }
};
