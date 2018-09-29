<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorHospitalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_hospitals', function (Blueprint $table) {
            $table->increments('id');
            //Separate by koma. Ex: Senin, Selasa
            $table->text('hari_praktek')->nullable();
            
            //Separate by koma. Ex: 13:00-17:00, 19:00-Selesai
            $table->text('jam_praktek')->nullable();
            
            $table->boolean('isOpen');
            $table->boolean('isActive');
            
            $table->integer('doctor_id')->unsigned();
            $table->foreign('doctor_id')->references('id')->on('doctors');

            $table->integer('hospital_id')->unsigned();
            $table->foreign('hospital_id')->references('id')->on('hospitals');
            
            $table->timestamps();

            //Done Until Mid Phase
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctor_hospitals');
    }
}
