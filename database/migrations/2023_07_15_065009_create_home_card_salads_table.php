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
        Schema::create('home_card_salads', function (Blueprint $table) {
            $table->id();
            $table->string('cardImg');
            $table->string('cardTitle');
            $table->string('cardTitle_en');
            $table->string('cardTitle_ru');
            $table->string('cardTitle_uz');
            $table->string('cardText');
            $table->string('cardText_en');
            $table->string('cardText_ru');
            $table->string('cardText_uz');
            $table->string('cardPrice');
            $table->integer('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_card_salads');
    }
};
