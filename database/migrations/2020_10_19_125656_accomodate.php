<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Accomodate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accomodate', function (Blueprint $table) {
            $table->bigIncrements('idaccomodate');

            $table->unsignedBigInteger('customer');
            $table->foreign('customer')->references('idcustomer')->on('customers')->onDelete('cascade');

            $table->unsignedBigInteger('room');
            $table->foreign('room')->references('idroom')->on('rooms')->onDelete('cascade');

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
        Schema::dropIfExists('accomodate');
    }
}
