<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHospitalClinicMessageTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospital_clinic_message_transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->text('isiPesan');

            //1: User, 2:Klinik RS, 3:Admin
            $table->integer('statusPenjawab');

            $table->integer('isSelesai');
            $table->boolean('isActive');
            $table->timestamps();

            //Bisa ambil user_id dan Hospital_id(doctorHospital)
            $table->integer('hCTrans_id')->unsigned();
            $table->foreign('hCTrans_id')->references('id')->on('hospital_clinic_transactions');

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
        Schema::dropIfExists('hospital_clinic_message_transactions');
    }
}
