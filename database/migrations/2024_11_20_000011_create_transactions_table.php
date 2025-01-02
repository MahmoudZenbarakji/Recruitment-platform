<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('net_total', 15, 2)->nullable();
            $table->decimal('sub_total', 15, 2)->nullable();
            $table->decimal('vat', 15, 2);
            $table->decimal('discount', 15, 2);
            $table->string('payment_status');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
