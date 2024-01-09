<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('code_details', function (Blueprint $table) {
            $table->id();
            $table->double('minimum_price', 8,2);
            $table->double('discount_amount', 8,2);
            $table->string('discount_type_id');
            $table->string('term_condition_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('code_details');
    }
};
