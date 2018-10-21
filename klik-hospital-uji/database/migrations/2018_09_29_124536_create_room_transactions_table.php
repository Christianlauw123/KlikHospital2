<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_transactions', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('lamaInap');
            $table->integer('totalBiaya');
            $table->integer('statusTransaksi');
            //khusus klik-doctor
            $table->text('alasan_kunjungan')->nullable();
            
            $table->boolean('isActive');

            $table->timestamps();

            $table->integer('room_id')->unsigned();
            $table->foreign('room_id')->references('id')->on('rooms');

            //Dokter yang tugas di kamar itu, ada setelah dikasi oleh RS bukan dipilih oleh pemesan
            $table->integer('doctorHospital_id')->nullable()->unsigned();
            $table->foreign('doctorHospital_id')->references('id')->on('doctor_hospitals');

            //Data pasien yg didaftarkan
            $table->integer('pasien_id')->nullable()->unsigned();
            $table->foreign('pasien_id')->references('id')->on('pasiens');

            //Daftarkan melalui akun siapa?
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
        Schema::dropIfExists('room_transactions');
    }
}
