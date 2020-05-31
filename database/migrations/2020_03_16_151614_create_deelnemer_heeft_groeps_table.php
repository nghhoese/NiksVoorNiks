<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeelnemerHeeftGroepsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deelnemer_heeft_groep', function (Blueprint $table) {
            $table->string('deelnemer_email',50);
            $table->foreign('deelnemer_email')->references('email')->on('deelnemer')->onDelete('cascade');;
            $table->string('groep_naam',50);
            $table->foreign('groep_naam')->references('naam')->on('groep');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deelnemer_heeft_groep');
    }
}
