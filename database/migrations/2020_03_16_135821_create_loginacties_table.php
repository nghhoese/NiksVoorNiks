<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoginactiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loginactie', function (Blueprint $table) {
            $table->string('ip',15);
            $table->dateTime('datum');
            $table->string('deelnemer_email',50);
            $table->foreign('deelnemer_email')->references('email')->on('deelnemer');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loginactie');
    }
}
