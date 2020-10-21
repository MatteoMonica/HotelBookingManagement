<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Customers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('idcustomer');
            $table->string('customername', 1000);
            $table->string('customersurname', 1000);
            $table->string('customergender', 1000);
            $table->date('customerbirthdate');
            $table->string('customerfiscalcode', 1000)->nullable();
            $table->string('customerbirthplace', 1000)->nullable();
            $table->string('customerbirthcity', 1000)->nullable();
            $table->string('customerbirthprovince', 1000)->nullable();
            $table->string('customercitizenship', 1000)->nullable();
            $table->string('customerdocumentType', 1000)->nullable();
            $table->string('customerdocumentnumber', 1000)->nullable();
            $table->string('customerdocumentplaceofissue', 1000)->nullable();
            $table->string('customerdocumentcityofissue', 1000)->nullable();
            $table->string('customerdocumentprovinceofissue', 1000)->nullable();

            $table->unsignedBigInteger('reservation');
            $table->foreign('reservation')->references('idreservation')->on('reservations')->onDelete('cascade');

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
        Schema::dropIfExists('customers');
    }
}
