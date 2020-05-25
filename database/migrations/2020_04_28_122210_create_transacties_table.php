<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transacties', function (Blueprint $table) {
            $table->increments('id');
            $table->string('zender_email',50);
            $table->string('ontvanger_email',50);
            $table->foreign('zender_email')->references('email')->on('deelnemer')->onDelete('cascade');;
            $table->foreign('ontvanger_email')->references('email')->on('deelnemer')->onDelete('cascade');;
            $table->integer('bedrag')->nullable();
            $table->dateTime('datum');
            $table->string('beschrijving');
            $table->integer('verstuurd')->nullable();
            $table->integer('geaccepteerd')->nullable();
            $table->integer('betaalverzoek')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transacties');
    }
}
