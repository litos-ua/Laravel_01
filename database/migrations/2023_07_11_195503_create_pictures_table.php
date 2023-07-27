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
        Schema::create('pictures', function (Blueprint $table) {
            //$table->id();
            $table->increments('id_pic');
            $table->string('filename', 60);
            $table->string('title', 60);
            $table->string('description', 150);
            $table->unsignedInteger('category');
            $table->unsignedInteger('fototype');
            $table->timestamps();

            //$table->foreign('category')->references('id_cat')->on('vacations');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pictures');
    }
};
