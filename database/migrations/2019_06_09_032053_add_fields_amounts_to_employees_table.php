<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsAmountsToEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->integer('monto_802')->nullable();
            $table->integer('monto_804')->nullable();
            $table->integer('monto_806')->nullable();
            $table->integer('monto_807')->nullable();
            $table->integer('monto_808')->nullable();
            $table->string('memo')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->dropColumn('monto_802');
            $table->dropColumn('monto_804');
            $table->dropColumn('monto_806');
            $table->dropColumn('monto_807');
            $table->dropColumn('monto_808');
            $table->dropColumn('memo');
        });
    }
}
