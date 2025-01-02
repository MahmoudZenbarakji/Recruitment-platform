<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicatntCvPivotTable extends Migration
{
    public function up()
    {
        Schema::create('applicatnt_cv', function (Blueprint $table) {
            $table->unsignedBigInteger('applicatnt_id');
            $table->foreign('applicatnt_id', 'applicatnt_id_fk_10274694')->references('id')->on('applicatnts')->onDelete('cascade');
            $table->unsignedBigInteger('cv_id');
            $table->foreign('cv_id', 'cv_id_fk_10274694')->references('id')->on('cvs')->onDelete('cascade');
        });
    }
}
