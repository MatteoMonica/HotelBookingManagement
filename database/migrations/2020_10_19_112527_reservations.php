<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Reservations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->bigIncrements('idreservation');
            $table->date('checkin');
            $table->date('checkout');

            $table->string('contacts', 1000)->nullable();

            $table->unsignedBigInteger('treatment');
            $table->foreign('treatment')->references('idtreatment')->on('treatments')->onDelete('cascade');

            $table->unsignedBigInteger('bookingstatus');
            $table->foreign('bookingstatus')->references('idstatusreservation')->on('statusreservation')->onDelete('cascade');

            $table->integer('adultsnumber')->default(0);
            $table->integer('kidsnumber')->default(0);
            $table->integer('newbornnumber')->default(0);

            $table->boolean('editabledata')->default(true);

            $table->text('notes')->nullable();

            $table->timestamps();
            $table->softDeletes('deleted_at', 0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}
