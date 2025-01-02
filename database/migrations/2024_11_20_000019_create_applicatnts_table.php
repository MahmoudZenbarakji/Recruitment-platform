<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicatntsTable extends Migration
{
    public function up()
    {
        Schema::create('applicatnts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('full_name');
            $table->string('education_level');
            $table->string('experience_year');
            $table->string('gender');
            $table->string('other_phone_number')->nullable();
            $table->date('birthday');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
