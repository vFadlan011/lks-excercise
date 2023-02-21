<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->string('nik', 16);
            $table->string('name', 100);
            $table->string('email', 200);
            $table->string('phone', 15);
            $table->text('report_msg');
            $table->string('report_img_1', 80)->nullable();
            $table->string('report_img_2', 80)->nullable();
            $table->string('report_img_3', 80)->nullable();
            $table->string('report_img_4', 80)->nullable();
            $table->string('report_img_5', 80)->nullable();
            $table->integer('report_timestamp');
            $table->enum('status', ['BARU', 'DIPROSES', 'DITOLAK', 'SELESAI'])->default('BARU');
            $table->text('response_msg')->nullable();
            $table->string('response_img_1', 80)->nullable();
            $table->string('response_img_2', 80)->nullable();
            $table->string('response_img_3', 80)->nullable();
            $table->string('response_img_4', 80)->nullable();
            $table->string('response_img_5', 80)->nullable();
            $table->integer('response_timestamp')->nullable();
            $table->foreignId('respondent_id')->nullable()->constrained('users', 'id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('reports');
    }
};
