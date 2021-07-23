<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('career_id')->nullable();
            $table->unsignedBigInteger('semester_id')->nullable();
            $table->string('identification', 10)->unique();
            $table->string('slug');
            $table->string('name');
            $table->string('lastname');
            $table->string('mothers_lastname');
            $table->timestamps();

            $table
                ->foreign('career_id')
                ->on('careers')
                ->references('id')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table
                ->foreign('semester_id')
                ->on('semesters')
                ->references('id')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
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
