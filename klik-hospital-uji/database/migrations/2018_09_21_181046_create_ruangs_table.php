<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRuangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ruangs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->integer('jum_pasien'); //untuk ranjang pasien
            $table->integer('jum_penunggu'); //untuk ranjang penunggu
            $table->integer('harga');
            $table->integer('rating');
            $table->text('fasilitas');
            //Dipisah dengan ','. Misal ada checkbox tv, kamar mandi, kulkas. Centang tv dan kamar mandi.. Simpan di db tv, kamar mandi.
            $table->boolean('is_active');
            $table->timestamps();

            //Set FK Ruang Rumah Sakit
            $table->integer('rumahsakit_id')->unsigned();
            $table->foreign('rumahsakit_id')->references('id')->on('rumah_sakits');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ruangs');
    }
}
