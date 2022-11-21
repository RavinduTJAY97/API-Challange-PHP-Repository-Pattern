<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVacanciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacancies', function (Blueprint $table) {
            $table->id();
            $table->string('job_title')->nullable();
            $table->string('seniority_level')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->integer('salary')->nullable();
            $table->string('currency')->nullable();
            $table->string('required_skills')->nullable();
            $table->string('company_size')->nullable();
            $table->string('company_domain')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vacancies');
    }
}
