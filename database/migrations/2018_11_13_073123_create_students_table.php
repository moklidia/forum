<?php

namespace App\Database;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
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
            'students',
            function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('group_id')->nullable();
                $table->foreign('group_id')->references('id')->on('groups')->onDelete('cascade');
                $table->string('last_name');
                $table->string('given_name');
                $table->date('date_of_birth');
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
        Schema::dropIfExists('students');
    }
}
