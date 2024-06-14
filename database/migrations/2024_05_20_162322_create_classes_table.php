<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('class_name', 255);
            $table->unsignedBigInteger('teacher_id');
            $table->unsignedBigInteger('subject_id');
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->timestamps();

            $table->foreign('teacher_id')->references('id')->on('teachers');
            // Jika Anda ingin menambahkan foreign key untuk 'subject_id', tambahkan baris di bawah ini:
            // $table->foreign('subject_id')->references('id')->on('subjects');

            $table->index('teacher_id');
            // Jika Anda ingin menambahkan index untuk 'subject_id', tambahkan baris di bawah ini:
            // $table->index('subject_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('classes');
    }
}
