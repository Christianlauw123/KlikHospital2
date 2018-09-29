<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePharmacyMessageTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pharmacy_message_transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->text('isiPesan');

            //1: User, 2:Pharmacy, 3:Admin
            $table->integer('statusPenjawab');

            $table->integer('isSelesai');
            $table->boolean('isActive');
            $table->timestamps();

            //Bisa ambil user_id dan pharmacy_id
            $table->integer('pharmacyTransactions_id')->unsigned();
            $table->foreign('pharmacyTransactions_id')->references('id')->on('pharmacy_transactions');

            $table->integer('admin_id')->unsigned();
            $table->foreign('admin_id')->references('id')->on('admins');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pharmacy_message_transactions');
    }
}
