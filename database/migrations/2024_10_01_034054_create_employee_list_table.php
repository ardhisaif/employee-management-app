<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('EmployeeList', function (Blueprint $table) {
            $table->increments('EmployeeID'); // Menggunakan auto-incrementing ID
            $table->string('Name', 512);
            $table->string('Birth Place', 512);
            $table->string('SEX', 512);
            $table->string('Birth_date', 512);
            $table->string('Status', 512);
            $table->string('JoinDate', 512);
            $table->string('Dept', 512);
            $table->string('JobTitle', 512);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('EmployeeList');
    }
}
