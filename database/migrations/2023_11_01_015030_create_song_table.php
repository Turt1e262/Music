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
        Schema::create('song_models', function (Blueprint $table) {
            $table->id();
            $table->string('NameSong');
            $table->string('Artist');
            $table->string('Type'); 
            $table->unsignedBigInteger('UserCreate');
            $table->foreign('UserCreate')->references('id')->on('users');
            $table->string('LinkMp3');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('song_models');
    }
};
