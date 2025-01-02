<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToChatsTable extends Migration
{
    public function up()
    {
        Schema::table('chats', function (Blueprint $table) {
            $table->unsignedBigInteger('sender_id')->nullable();
            $table->foreign('sender_id', 'sender_fk_10274572')->references('id')->on('users');
            $table->unsignedBigInteger('receiver_id')->nullable();
            $table->foreign('receiver_id', 'receiver_fk_10274573')->references('id')->on('users');
        });
    }
}
