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
        Schema::create('competitions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('participant_id');
            $table->unsignedBigInteger('competition_level_id');
            $table->string('competition_name');
            $table->integer('status'); // 0 : inactive, 1: active
            $table->dateTime('begin_date');
            $table->dateTime('end_date');
            $table->timestamps();
        });
        Schema::table('competitions', function (Blueprint $table) {
            $table->foreign('participant_id')
            ->references('id')
            ->on('participants')
            ->onDelete('cascade');
            $table->foreign('competition_level_id')
            ->references('id')
            ->on('competition_levels')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('competitions');
    }
};
