<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->integer('jum_pasien'); //untuk ranjang pasien
            $table->integer('jum_penunggu'); //untuk ranjang penunggu
            $table->integer('harga');
            $table->integer('rating');
            $table->text('fasilitas');
            //Dipisah dengan ','. Misal ada checkbox tv, kamar mandi, kulkas. Centang tv dan kamar mandi.. Simpan di db tv, kamar mandi.

            $table->boolean('isFull');
            $table->boolean('isActive');

            $table->integer('hospital_id')->unsigned();
            $table->foreign('hospital_id')->references('id')->on('hospitals');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
