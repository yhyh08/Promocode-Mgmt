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
        Schema::create('promocodes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->string('code')->unique();
            $table->unsignedInteger('redeem_count')->default(0);
            $table->integer('limit');
            $table->dateTime('expires_at');
            $table->boolean('status')->default(1);
            $table->string('user_id');
            $table->string('code_detail_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promocodes');
    }
};
