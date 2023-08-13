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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('title_en');
            $table->string('title_ru');
            $table->string('title_uz');
            $table->text('text');
            $table->text('text_en');
            $table->text('text_ru');
            $table->text('text_uz');
            $table->string('address');
            $table->string('address_en');
            $table->string('address_ru');
            $table->string('address_uz');
            $table->text('addressText');
            $table->text('addressText_en');
            $table->text('addressText_ru');
            $table->text('addressText_uz');
            $table->string('phone');
            $table->string('email');
            $table->string('fac');
            $table->string('ins');
            $table->integer('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
