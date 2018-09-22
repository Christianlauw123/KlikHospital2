<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaksiRuangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_ruangs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nik_pasien');
            $table->string('nama_pasien');
            $table->datetime('ttl_pasien');
            $table->boolean('jenis_kelamin');
            $table->text('alamat');

            $table->string('nama_pemesan');
            $table->string('no_telp_pemesan');
            $table->integer('status_pesanan');

            $table->integer('total_biaya');
            $table->boolean('is_active');
            $table->timestamps();

            //FK
            $table->integer('dokterrumahsakit_id')->unsigned();
            $table->foreign('dokterrumahsakit_id')->references('id')->on('dokter_rumah_sakits');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi_ruangs');
    }
}
