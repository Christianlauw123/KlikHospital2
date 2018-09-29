<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClinicTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clinic_transactions', function (Blueprint $table) {
            $table->increments('id');

            //Hari dan range jam praktek yang dipilih
            $table->text('hari_praktek');
            $table->text('jam_praktek');

            $table->integer('noAntrian');

            $table->integer('totalBiaya');
            $table->integer('statusTransaksi');
            $table->boolean('isActive');
            $table->timestamps();

            //Dokter pilihan dan klinik pilihan
            $table->integer('doctorclinic_id')->unsigned();
            $table->foreign('doctorclinic_id')->references('id')->on('doctor_clinics');

            //Data pasien yg didaftarkan. Berisi null kalau yang didaftarkan adalah diri sendiri, karena datanya sudah exist
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
        Schema::dropIfExists('clinic_transactions');
    }
}
