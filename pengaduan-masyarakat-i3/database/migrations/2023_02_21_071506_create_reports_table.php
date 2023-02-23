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
            $table->uuid();
            $table->string('name', 100);
            $table->string('nik', 16);
            $table->email('email', 120);
            $table->string('phone', 15);
            $table->text('report_msg');
            $table->string('report_img_1', 60)->nullable();
            $table->string('report_img_2', 60)->nullable();
            $table->string('report_img_3', 60)->nullable();
            $table->string('report_img_4', 60)->nullable();
            $table->string('report_img_5', 60)->nullable();
            $table->enum('status', ["BARU", "DIPROSES", "DITOLAK", "SELESAI"])->default("BARU");
            $table->bigInteger('report_timestamp');
            $table->text('response_msg');
            $table->string('response_img_1', 60)->nullable();
            $table->string('response_img_2', 60)->nullable();
            $table->string('response_img_3', 60)->nullable();
            $table->string('response_img_4', 60)->nullable();
            $table->string('response_img_5', 60)->nullable();
            $table->foreignId('respondent_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('reports');
    }
};
