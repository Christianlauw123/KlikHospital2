<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomMessageTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_message_transactions', function (Blueprint $table) {
            $table->increments('id');

            $table->text('isiPesan');

            //1: User, 2:Room RS, 3:Admin
            $table->integer('statusPenjawab');

            $table->integer('isSelesai');
            $table->boolean('isActive');
            $table->timestamps();

            //Bisa ambil user_id dan klinik_id(doctorKlinik)
            $table->integer('roomTransactions_id')->unsigned();
            $table->foreign('roomTransactions_id')->references('id')->on('room_transactions');

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
        Schema::dropIfExists('room_message_transactions');
    }
}
