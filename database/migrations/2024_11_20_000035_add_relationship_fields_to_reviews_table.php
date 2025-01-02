<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToReviewsTable extends Migration
{
    public function up()
    {
        Schema::table('reviews', function (Blueprint $table) {
            $table->unsignedBigInteger('company_id')->nullable();
            $table->foreign('company_id', 'company_fk_10274698')->references('id')->on('companies');
            $table->unsignedBigInteger('applicant_id')->nullable();
            $table->foreign('applicant_id', 'applicant_fk_10274699')->references('id')->on('applicatnts');
        });
    }
}
