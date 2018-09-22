<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaksiDoktersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_dokters', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_pasien');
            $table->boolean('jenis_kelamin');
            $table->text('alamat');
            $table->text('keluhan');

            $table->string('hari_janji');
            $table->string('jam_janji');

            $table->string('nama_pemesan');
            $table->string('no_telp_pemesan');
            $table->integer('status_pesanan');

            $table->integer('total_biaya');
            $table->boolean('is_active');

            $table->boolean('is_klinik');
            //Untuk membedakan transaksi Klinik Pribadi atau Klinik di RS

            $table->timestamps();

            //FK
            $table->integer('dokterrumahsakit_id')->unsigned();
            $table->foreign('dokterrumahsakit_id')->references('id')->on('dokter_rumah_sakits');

            $table->integer('dokterklinik_id')->unsigned();
            $table->foreign('dokterklinik_id')->references('id')->on('dokter_kliniks');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi_dokters');
    }
}
