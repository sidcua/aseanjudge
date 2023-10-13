<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompetitionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('competition', function (Blueprint $table) {
            $table->bigIncrements('competitionID');
            $table->string('performer')->default(0);
            $table->string('sex')->nullable();
            $table->double('talent')->default(0);
            $table->double('close_door')->default(0);
            $table->double('school_uniform')->default(0);
            $table->double('sports')->default(0);
            $table->double('barong')->default(0);
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
        Schema::dropIfExists('competition');
    }
}
