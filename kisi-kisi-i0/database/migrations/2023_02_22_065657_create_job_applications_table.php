<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('job_applications', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained('users', 'id');
            $table->foreignUuid('vacancy_id')->constrained('job_vacancies', 'id');
            $table->enum('status', ['dikirim', 'diterima', 'ditolak', 'dibatalkan']);
            $table->bigInteger('date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('job_applications');
    }
};
