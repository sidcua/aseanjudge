<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSportsWear extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sports_wear', function (Blueprint $table) {
            $table->bigIncrements('sportsID');
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
        Schema::dropIfExists('sports_wear');
    }
}
