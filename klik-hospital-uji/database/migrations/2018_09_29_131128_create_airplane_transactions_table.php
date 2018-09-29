<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAirplaneTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('airplane_transactions', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('totalBiaya');
            $table->date('tglPenerbangan');
            $table->integer('statusTransaksi');

            $table->boolean('isActive');
            $table->timestamps();

            //Penyedia Jasa
            $table->integer('airplane_id')->unsigned();
            $table->foreign('airplane_id')->references('id')->on('airplanes');

            //RS Asal
            $table->integer('hospital1_id')->unsigned();
            $table->foreign('hospital1_id')->references('id')->on('hospitals');

            //RS Tujuan
            $table->integer('hospital2_id')->unsigned();
            $table->foreign('hospital2_id')->references('id')->on('hospitals');

            //Pemesan
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            //Metode Bayar? //Sementara
            $table->integer('payment_id')->nullable()->unsigned();
            $table->foreign('payment_id')->references('id')->on('payments');

            //Promosi
            $table->integer('promotion_id')->nullable()->unsigned();
            $table->foreign('promotion_id')->references('id')->on('promotions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('airplane_transactions');
    }
}
