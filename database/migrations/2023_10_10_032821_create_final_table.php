<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFinalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('final', function (Blueprint $table) {
            $table->bigIncrements('finalsID');
            $table->string('performer')->nullable();
            $table->string('sex')->nullable();
            $table->integer('judge')->nullable();
            $table->integer('beauty')->nullable();
            $table->integer('ability')->nullable();
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
        Schema::dropIfExists('final');
    }
}
