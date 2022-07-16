<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLanguageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('language', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');
            // $table->foreign('employee_id')->references('id')->on('employee')->onDelete('cascade');
            $table->string('language')->nullable();
            $table->integer('read')->nullable();
            $table->integer('write')->nullable();
            $table->integer('speak')->nullable();
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
        Schema::dropIfExists('language');
    }
}
