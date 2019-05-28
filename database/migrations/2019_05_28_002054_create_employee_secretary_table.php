<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeSecretaryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_secretary', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('secretary_id')->unsigned();
            $table->integer('employee_id')->unsigned();
            
            $table->foreign('secretary_id')->references('id')->on('secretaries');
            $table->foreign('employee_id')->references('id')->on('employees');
            
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
        Schema::dropIfExists('employee_secretary');
    }
}
