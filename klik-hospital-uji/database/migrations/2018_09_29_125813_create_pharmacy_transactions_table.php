<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePharmacyTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pharmacy_transactions', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('totalBiaya');

            //-1: Kalau dia hanya tanya obat?
            $table->integer('statusPesanan');

            //Jika dengan resep image disimpan
            $table->integer('isResep');
            //Path image
            $table->string('gambarResep')->nullable();

            $table->boolean('isActive');
            $table->timestamps();

            //Pesan dimana? jika null berarti pakai resep
            $table->integer('pharmacy_id')->nullable()->unsigned();
            $table->foreign('pharmacy_id')->references('id')->on('pharmacies');

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
        Schema::dropIfExists('pharmacy_transactions');
    }
}
