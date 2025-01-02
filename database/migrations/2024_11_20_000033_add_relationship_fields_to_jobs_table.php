<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToJobsTable extends Migration
{
    public function up()
    {
        Schema::table('jobs', function (Blueprint $table) {
            $table->unsignedBigInteger('type_id')->nullable();
            $table->foreign('type_id', 'type_fk_10274601')->references('id')->on('job_types');
            $table->unsignedBigInteger('salary_id')->nullable();
            $table->foreign('salary_id', 'salary_fk_10274602')->references('id')->on('salaries');
            $table->unsignedBigInteger('company_id')->nullable();
            $table->foreign('company_id', 'company_fk_10274605')->references('id')->on('companies');
        });
    }
}
