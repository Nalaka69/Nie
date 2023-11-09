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
        Schema::create('day_archives', function (Blueprint $table) {
            $table->id();
            $table->date('archive_date');
            $table->string('program_name');
            $table->string('episode');
            $table->string('is_visible');
            $table->string('program_directory');
            $table->unsignedBigInteger('archive_id');
            $table->foreign('archive_id')->references('id')->on('program_archives')->onDelete('cascade');
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
        Schema::dropIfExists('day_archives');
    }
};
