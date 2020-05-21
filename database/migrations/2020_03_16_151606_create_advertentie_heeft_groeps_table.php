<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvertentieHeeftGroepsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertentie_heeft_groep', function (Blueprint $table) {
            $table->string('groep_naam',50);
            $table->foreign('groep_naam')->references('naam')->on('groep');
            $table->unsignedInteger('advertentie_id');
            $table->foreign('advertentie_id')->references('id')->on('advertentie');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('advertentie_heeft_groep');
    }
}
