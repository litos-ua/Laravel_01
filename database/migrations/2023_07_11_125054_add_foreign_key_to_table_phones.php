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
        Schema::table('phones', function (Blueprint $table) {
//
//            $table->unsignedBigInteger('user_id'); // Foreign key column
//
//            $table->foreign('user_id') // Define foreign key constraint
//            ->references('id')
//                ->on('users')
//                ->onDelete('cascade');

            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('phones', function (Blueprint $table) {
            $table->dropForeign(['user_id']); // Drop foreign key constraint
            $table->dropColumn('user_id'); // Drop foreign key column
        });
    }
};
