<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {

            $table->id();
            $table->foreignId('user_id')
                ->constrained('users');

            $table->foreignId('exam_id')
                ->constrained('exams');

            $table->foreignId('question_id')
                ->constrained('questions');

            $table->foreignId('option_id')
                ->constrained('options');

            $table->boolean('is_correct');
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
        Schema::dropIfExists('answers');
    }
}
