<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * id
     * name
     * nik
     * email
     * phone
     * report
     * report_img1
     * report_img2
     * report_img3
     * report_img4
     * report_img5
     * report_timestamp
     * status
     * response
     * response_img1
     * response_img2
     * response_img3
     * response_img4
     * response_img5
     * response_timestamps
     * respondent_id
     */

    public function up() {
        Schema::create('reports', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 60);
            $table->string('nik', 16);
            $table->string('email', 320);
            $table->string('phone', 20);
            $table->text('report_msg');
            $table->string('report_img1', 60);
            $table->string('report_img2', 60)->nullable();
            $table->string('report_img3', 60)->nullable();
            $table->string('report_img4', 60)->nullable();
            $table->string('report_img5', 60)->nullable();
            $table->unsignedBigInteger('report_timestamp');
            $table
                ->enum('status', ['BARU', 'DIPROSES', 'DITOLAK', 'SELESAI'])
                ->default('BARU');

            $table->text('response_msg')->nullable();
            $table->string('response_img1', 60)->nullable();
            $table->string('response_img2', 60)->nullable();
            $table->string('response_img3', 60)->nullable();
            $table->string('response_img4', 60)->nullable();
            $table->string('response_img5', 60)->nullable();
            $table->unsignedBigInteger('response_timestamp')->nullable();
            $table->unsignedInteger('respondent_id')->nullable();
            $table
                ->foreign('respondent_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('reports', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
        Schema::dropIfExists('reports');
    }
};
