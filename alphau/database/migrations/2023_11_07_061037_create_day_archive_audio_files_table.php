<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('day_archive_audio_files', function (Blueprint $table) {
            $table->id();
            $table->string('day_program_file');
            $table->unsignedBigInteger('day_program_id');
            $table->foreign('day_program_id')->references('id')->on('day_archives')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('day_archive_audio_files');
    }
};
