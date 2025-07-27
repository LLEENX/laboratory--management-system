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
        Schema::create('practicum_groups', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kelas');
            $table->foreignId('dosen_id')->constrained('users'); // constraint ke dosen pembimbing
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('practicum_groups');
    }
};
