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
        Schema::table('users', function (Blueprint $table) {
            // Set the new default value to 0
            $newDefaultValue = 0;
            Schema::table('users', function (Blueprint $table) use ($newDefaultValue) {
                $table->integer('status')->default($newDefaultValue)->change();
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
//        Schema::table('users', function (Blueprint $table) {
//            //
//        });
    }
};
