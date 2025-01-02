<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobSkilPivotTable extends Migration
{
    public function up()
    {
        Schema::create('job_skil', function (Blueprint $table) {
            $table->unsignedBigInteger('job_id');
            $table->foreign('job_id', 'job_id_fk_10274669')->references('id')->on('jobs')->onDelete('cascade');
            $table->unsignedBigInteger('skil_id');
            $table->foreign('skil_id', 'skil_id_fk_10274669')->references('id')->on('skils')->onDelete('cascade');
        });
    }
}
