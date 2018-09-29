<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAirplaneMessageTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('airplane_message_transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->text('isiPesan');

            //1: User, 2:Penyedia Layanan, 3:Admin
            $table->integer('statusPenjawab');

            $table->integer('isSelesai');
            $table->boolean('isActive');
            $table->timestamps();

            //Bisa ambil user_id dan airplane_id
            $table->integer('airplaneTransaction_id')->unsigned();
            $table->foreign('airplaneTransaction_id')->references('id')->on('airplane_transactions');

            $table->integer('admin_id')->unsigned();
            $table->foreign('admin_id')->references('id')->on('admins');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('airplane_message_transactions');
    }
}
