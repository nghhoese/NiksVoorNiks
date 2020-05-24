<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActiviteitHeeftDeelnemersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activiteit_heeft_deelnemer', function (Blueprint $table) {
            $table->string('deelnemer_email',50);
            $table->unsignedInteger('activiteit_id');
            $table->foreign('activiteit_id')->references('id')->on('activiteit');
            $table->foreign('deelnemer_email')->references('email')->on('deelnemer')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activiteit_heeft_deelnemer');
    }
}
