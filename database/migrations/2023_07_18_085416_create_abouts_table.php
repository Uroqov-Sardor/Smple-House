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
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('title_en');
            $table->string('title_ru');
            $table->string('title_uz');
            $table->text('paragraph');
            $table->text('paragraph_en');
            $table->text('paragraph_ru');
            $table->text('paragraph_uz');
            $table->string('cardImg');
            $table->string('cardTitle');
            $table->string('cardTitle_en');
            $table->string('cardTitle_ru');
            $table->string('cardTitle_uz');
            $table->text('cardText');
            $table->text('cardText_en');
            $table->text('cardText_ru');
            $table->text('cardText_uz');
            $table->integer('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abouts');
    }
};
