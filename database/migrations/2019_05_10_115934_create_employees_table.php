<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('cedula');
            $table->string('name');
            $table->date('date_admission');            
            $table->date('birthday');
            $table->boolean('sex');
            $table->string('type');
            $table->string('cost');
            $table->string('cost_description');
            $table->string('sap');
            $table->string('sap_description');
            $table->string('job');
            $table->string('job_description');
            $table->string('location');


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
        Schema::dropIfExists('employees');
    }
}
