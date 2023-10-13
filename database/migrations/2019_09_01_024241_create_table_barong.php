<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBarong extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barong_tagalog_terno', function (Blueprint $table) {
            $table->bigIncrements('barong_ternoID');
            $table->string('performer')->nullable();
            $table->string('sex')->nullable();
            $table->integer('judge')->nullable();
            $table->integer('beauty')->nullable();
            $table->integer('poise')->nullable();
            $table->integer('projection')->nullable();
            $table->integer('appropriateness')->nullable();
            $table->integer('overall')->nullable();
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
        Schema::dropIfExists('barong_tagalog_terno');
    }
}
