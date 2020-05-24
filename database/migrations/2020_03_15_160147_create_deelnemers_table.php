<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeelnemersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deelnemer', function (Blueprint $table) {
            $table->string('email',50)->primary();
            $table->string('wachtwoord',100);
            $table->string('voornaam',45);
            $table->string('tussenvoegsel',45)->nullable();
            $table->string('achternaam',45);
            $table->date('geboortedatum');
            $table->string('telefoonnummer',20);
            $table->string('postcode',6);
            $table->string('huisnummer',10);
            $table->string('foto',200)->nullable();
            $table->integer('niksen');
            $table->string('beschrijving',500);
            $table->string('rol_naam',50);
            $table->foreign('rol_naam')->references('naam')->on('rol');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deelnemer');
    }
}
