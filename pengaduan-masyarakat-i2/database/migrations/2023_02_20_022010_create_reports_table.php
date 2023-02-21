<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('reports', function (Blueprint $table) {
            $table->uuid('id')->primary()->default(DB::raw('(UUID())'));
            $table->string('name', 100);
            $table->string('nik', 16);
            $table->string('email', 120);
            $table->string('phone', 15);
            $table->text('report_msg');
            $table->string('report_img_1', 65)->nullable();
            $table->string('report_img_2', 65)->nullable();
            $table->string('report_img_3', 65)->nullable();
            $table->string('report_img_4', 65)->nullable();
            $table->string('report_img_5', 65)->nullable();
            $table->enum('status', ['BARU', 'DIPROSES', 'DITOLAK', 'SELESAI'])->default('BARU');
            $table->bigInteger('report_timestamp');
            $table->text('response_msg')->nullable();
            $table->string('response_img_1', 65)->nullable();
            $table->string('response_img_2', 65)->nullable();
            $table->string('response_img_3', 65)->nullable();
            $table->string('response_img_4', 65)->nullable();
            $table->string('response_img_5', 65)->nullable();
            $table->bigInteger('response_timestamp')->nullable();
            $table->foreignId('respondent_id')->nullable()->constrained('users', 'id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('users');
    }
};
