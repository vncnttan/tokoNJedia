<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('locations', function (Blueprint $table) {
            $table->uuid('id')->default(DB::raw('(UUID())'))->primary();
            $table->string("city")->default("Jakarta");
            $table->string("country")->default("Indonesia");
            $table->string("address")->default("Budi Raya Street");
            $table->string("notes")->default("")->nullable(true);
            $table->string("postal_code")->default("22044");
            $table->uuid("locationable_id");
            $table->timestamp("created_at");
            $table->timestamp("updated_at")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('locations');
    }
};
