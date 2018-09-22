<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDokterKliniksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dokter_kliniks', function (Blueprint $table) {
            $table->increments('id');
            $table->text('hari_praktek')->nullable();
            //Separate by koma. Ex: Senin, Selasa
            $table->text('jam_praktek')->nullable();
            //Separate by koma. Ex: 13:00-17:00, 19:00-Selesai
            
            $table->boolean('is_active');
            
            $table->integer('dokter_id')->unsigned();
            $table->foreign('dokter_id')->references('id')->on('dokters');

            $table->integer('klinik_id')->unsigned();
            $table->foreign('klinik_id')->references('id')->on('kliniks');
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
        Schema::dropIfExists('dokter_kliniks');
    }
}
