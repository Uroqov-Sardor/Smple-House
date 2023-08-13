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
        Schema::create('about_card_teams', function (Blueprint $table) {
            $table->id();
            $table->string('cardImg');
            $table->string('cardName');
            $table->string('cardName_en');
            $table->string('cardName_ru');
            $table->string('cardName_uz');
            $table->string('cardTitle');
            $table->string('cardTitle_en');
            $table->string('cardTitle_ru');
            $table->string('cardTitle_uz');
            $table->text('cardText');
            $table->text('cardText_en');
            $table->text('cardText_ru');
            $table->text('cardText_uz');
            $table->string('cardInstagram');
            $table->string('cardFacebook');
            $table->integer('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_card_teams');
    }
};
