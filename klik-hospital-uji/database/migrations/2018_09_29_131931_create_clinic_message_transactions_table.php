<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClinicMessageTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clinic_message_transactions', function (Blueprint $table) {
            $table->increments('id');

            $table->text('isiPesan');

            //1: User, 2:Klinik, 3:Admin
            $table->integer('statusPenjawab');

            $table->integer('isSelesai');
            $table->boolean('isActive');
            $table->timestamps();

            //Bisa ambil user_id dan klinik_id(doctorKlinik)
            $table->integer('clinicTransactions_id')->unsigned();
            $table->foreign('clinicTransactions_id')->references('id')->on('clinic_transactions');

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
        Schema::dropIfExists('clinic_message_transactions');
    }
}
