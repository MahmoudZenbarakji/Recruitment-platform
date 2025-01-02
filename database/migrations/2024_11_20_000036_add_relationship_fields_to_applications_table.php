<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToApplicationsTable extends Migration
{
    public function up()
    {
        Schema::table('applications', function (Blueprint $table) {
            $table->unsignedBigInteger('job_id')->nullable();
            $table->foreign('job_id', 'job_fk_10274710')->references('id')->on('jobs');
            $table->unsignedBigInteger('applicant_id')->nullable();
            $table->foreign('applicant_id', 'applicant_fk_10274715')->references('id')->on('applicatnts');
        });
    }
}
