<?php

namespace App\Database;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();

        Schema::create(
            'points',
            function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('student_id');
                $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
                $table->unsignedInteger('subject_id');
                $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');
                $table->integer('points');
                $table->timestamps();
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('points');
    }
}
