<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exams', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->integer('question_length');
            $table->integer('total_marks')->default(0);
            $table->string('total_time')->nullable();
            $table->string('unique_code')->unique();
            $table->dateTime('start')->nullable();
            $table->dateTime('end')->nullable();
            $table->foreignId('user_id')->constrained('users');
            $table->boolean('status')->default(true);
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
        Schema::dropIfExists('exams');
    }
}
