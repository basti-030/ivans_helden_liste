<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_tasks', function (Blueprint $table) {
            $table->id();
            $table->string("task")->nullable();
            $table->date("deadline")->nullable();
            $table->string("shortDescription")->nullable();
            $table->string("estHour")->nullable();
            $table->string("totalHour")->nullable();
            $table->string("developer")->nullable();
            $table->string("tester")->nullable();
            $table->string("status")->nullable();
            $table->string("progress")->nullable();
            $table->date("EnDate")->nullable();
            $table->string("pId")->nullable();
            $table->string("pIdNr");
            $table->string("KvaId")->nullable();
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
        Schema::dropIfExists('project_tasks');
    }
}
