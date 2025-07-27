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
        Schema::create('practicum_group_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('practicum_group_id')->constrained('practicum_groups');
            $table->foreignId('user_id')->constrained('users'); // constraint mahasiswa
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('practicum_group_user');
    }
};
