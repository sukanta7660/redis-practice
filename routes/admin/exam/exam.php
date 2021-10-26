<?php

use App\Http\Controllers\Admin\Exam\AnswerController;
use App\Http\Controllers\Admin\Exam\ExamController;
use Illuminate\Support\Facades\Route;
use PHPUnit\TextUI\XmlConfiguration\Group;

Route::group(
    [
        'prefix' => ''
    ],
    function () {
        Route::resource('/exams', ExamController::class);

        Route::group([
            'prefix' => 'exams',
            'as' => 'exams.'
        ],
        function () {

            Route::post('submit-answer',[AnswerController::class,'submit_answer'])->name('submit_answer');
        });

    }
);
