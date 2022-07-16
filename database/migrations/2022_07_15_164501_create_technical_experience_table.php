<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTechnicalExperienceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('technical_experience', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');
            // $table->foreign('employee_id')->references('id')->on('employee')->onDelete('cascade');
            $table->string('language_name')->nullable();
            $table->string('experience_level')->nullable();
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
        Schema::dropIfExists('technical_experience');
    }
}
