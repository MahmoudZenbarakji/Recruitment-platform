<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicatntSkilPivotTable extends Migration
{
    public function up()
    {
        Schema::create('applicatnt_skil', function (Blueprint $table) {
            $table->unsignedBigInteger('applicatnt_id');
            $table->foreign('applicatnt_id', 'applicatnt_id_fk_10274696')->references('id')->on('applicatnts')->onDelete('cascade');
            $table->unsignedBigInteger('skil_id');
            $table->foreign('skil_id', 'skil_id_fk_10274696')->references('id')->on('skils')->onDelete('cascade');
        });
    }
}
