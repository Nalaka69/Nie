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
        Schema::create('automation_audio_files', function (Blueprint $table) {
            $table->id();
            $table->string('automation_file')->nullable();
            $table->string('duration')->nullable();
            $table->unsignedBigInteger('automation_id');
            $table->foreign('automation_id')->references('id')->on('automations')->onDelete('cascade');
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
        Schema::dropIfExists('automation_audio_files');
    }
};
