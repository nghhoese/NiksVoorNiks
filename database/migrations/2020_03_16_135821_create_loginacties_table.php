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
        Schema::create('loginacties', function (Blueprint $table) {
            $table->string('ip',15);
            $table->date('datum');
            $table->string('deelnemer_email',50);
            $table->foreign('deelnermer_email')->references('email')->on('deelnemer');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loginacties');
    }
}
