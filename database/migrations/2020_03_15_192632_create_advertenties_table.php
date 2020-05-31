<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvertentiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertentie', function (Blueprint $table) {
            $table->increments('id');
            $table->string('deelnemer_email',50);
            $table->foreign('deelnemer_email')->references('email')->on('deelnemer')->onDelete('cascade');;
            $table->string('titel',50);
            $table->unsignedInteger('vraag');
            $table->unsignedInteger('bieden');
            $table->string('beschrijving',500)->nullable();
            $table->dateTime('aanmaakdatum');
            $table->string('foto',200)->nullable();
            $table->unsignedInteger('prijs');
            $table->string('plaats',50);
            $table->foreign('plaats')->references('naam')->on('plaats');
            $table->string('categorie',50);
            $table->foreign('categorie')->references('naam')->on('categorie');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('advertentie');
    }
}
