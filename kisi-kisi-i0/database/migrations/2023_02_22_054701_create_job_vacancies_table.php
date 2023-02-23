<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('job_vacancies', function (Blueprint $table) {
            $table->uuid('id')->primary()->default(DB::raw('(UUID())'));
            $table->string('title', 60);
            $table->foreignUuid('company_id')->constrained('companies', 'id');
            $table->foreignId('category_id')->constrained('job_categories', 'id');
            $table->string('regional', 60);
            $table->integer('salary'); // Rp
            $table->text('description');
            $table->bigInteger('due_to');
            $table->bigInteger('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('job_vacancies');
    }
};
