<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDrugPharmacyTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drug_pharmacy_transactions', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('jumlah');
            $table->boolean('isActive');
            $table->timestamps();

            $table->integer('pharmacyTransaction_id')->unsigned();
            $table->foreign('pharmacyTransaction_id')->references('id')->on('pharmacy_transactions');

            $table->integer('drug_id')->unsigned();
            $table->foreign('drug_id')->references('id')->on('drugs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('drug_pharmacy_transactions');
    }
}
