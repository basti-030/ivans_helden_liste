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
            $table->string("task");
            $table->date("deadline");
            $table->string("shortDescription");
            $table->string("estHour");
            $table->string("totalHour");
            $table->string("developer");
            $table->string("tester");
            $table->string("status");
            $table->string("progress");
            $table->date("EnDate");
            $table->string("pId");
            $table->string("pIdNr");
            $table->string("KvaId");
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
