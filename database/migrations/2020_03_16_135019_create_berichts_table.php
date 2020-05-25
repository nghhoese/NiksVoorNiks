<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBerichtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bericht', function (Blueprint $table) {
            $table->increments('id');
            $table->string('inhoud',500);
            $table->string('onderwerp',50);
            $table->dateTime('datum');
            $table->integer('gelezen')->nullable();
            $table->integer('verwijderd_door_ontvanger')->nullable();
            $table->integer('verwijderd_door_zender')->nullable();
            $table->string('zender_email',50);
            $table->string('ontvanger_email',50);
            $table->foreign('zender_email')->references('email')->on('deelnemer')->onDelete('cascade');
            $table->foreign('ontvanger_email')->references('email')->on('deelnemer')->onDelete('cascade');
            $table->string('betaalverzoek_link')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bericht');
    }
}
