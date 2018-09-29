<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nid');
            $table->string('nama');
            $table->text('profil');
            $table->text('pendidikan'); //Pisah juga dengan ','
            $table->text('pengalaman'); //Pisah juga dengan ','
            $table->boolean('isActive');
            
            //kalau null asumsi dokter umum (?)
            $table->integer('spesialist_id')->unsigned()->nullable(); 
            $table->foreign('spesialist_id')->references('id')->on('specialists');
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
        Schema::dropIfExists('doctors');
    }
}
