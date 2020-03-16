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
            $table->foreign('deelnemer_email')->references('email')->on('deelnemer');
            $table->string('title',50);
            $table->int('vraag',4);
            $table->int('bieden',4);
            $table->string('beschrijving',500)->nullable();
            $table->date('aanmaakdatum');
            $table->string('foto',200)->nullable();
            $table->int('prijs',11);
            $table->string('postcode',6);
            $table->string('huisnummer',10);
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