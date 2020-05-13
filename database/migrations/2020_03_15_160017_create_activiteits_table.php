<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActiviteitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activiteit', function (Blueprint $table) {
            $table->increments('id');
            $table->string('naam',50);
            $table->string('beschrijving',500);
            $table->date('datum');
            $table->unsignedInteger('max_deelnemers')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activiteit');
    }
}
