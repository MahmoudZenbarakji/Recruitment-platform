<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('status');
            $table->datetime('start_review')->nullable();
            $table->datetime('closed_date')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
