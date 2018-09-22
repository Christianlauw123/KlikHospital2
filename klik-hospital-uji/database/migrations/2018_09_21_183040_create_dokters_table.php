<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoktersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dokters', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nid');
            $table->string('nama');
            $table->text('profil');
            $table->text('pendidikan'); //Pisah juga dengan ','
            $table->text('pengalaman'); //Pisah juga dengan ','
            $table->boolean('is_active');
            
            $table->integer('spesialis_id')->unsigned()->nullable(); //kalau null asumsi dokter umum
            $table->foreign('spesialis_id')->references('id')->on('spesialis');
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
        Schema::dropIfExists('dokters');
    }
}
