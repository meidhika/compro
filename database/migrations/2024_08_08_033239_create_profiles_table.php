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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap', length: 55);
            $table->string('alamat', length: 250);
            $table->integer('no_telpon');
            $table->string('email', length: 55)->unique();
            $table->string('facebook', length: 180);
            $table->string('instagram', length: 180);
            $table->string('twitter', length: 180);
            $table->string('linkedin', length: 180);
            $table->string('description', length: 180);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
