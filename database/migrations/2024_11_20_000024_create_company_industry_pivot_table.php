<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyIndustryPivotTable extends Migration
{
    public function up()
    {
        Schema::create('company_industry', function (Blueprint $table) {
            $table->unsignedBigInteger('company_id');
            $table->foreign('company_id', 'company_id_fk_10274569')->references('id')->on('companies')->onDelete('cascade');
            $table->unsignedBigInteger('industry_id');
            $table->foreign('industry_id', 'industry_id_fk_10274569')->references('id')->on('industries')->onDelete('cascade');
        });
    }
}
