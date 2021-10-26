<?php

namespace App\Http\Controllers\Admin\Exam;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Exam;
use App\Models\Options;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AnswerController extends Controller
{
    /**
     * Submit Answer
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function submit_answer(Request $request)
    {
        $nextq = Session::get("nextq");
        $wrongans = Session::get("wrongans");
        $correctans = Session::get("correctans");

        $request->validate([
            'option' => 'required'
        ]);

        $nextq += 1;

        $given_ans = $request->option;
        $current_question = $request->question_id;

        $option_check = Options::whereId($given_ans)
            ->where([
                'question_id' => $current_question,
                'is_correct' => true
            ])->first();

        $is_correct = $option_check ? true : false;


        Answer::create([
            'user_id' => auth()->user()->id,
            'question_id' => $current_question,
            'option_id' => $given_ans,
            'exam_id' => $request->exam_id,
            'is_correct' => $is_correct
        ]);

        if (!$is_correct) {
            $wrongans += 1;
        }

        $correctans += 1;

        Session::put("nextq", $nextq);
        Session::put("wrongans", $wrongans);
        Session::put("correctans", $correctans);

        $i = 0;

        $questions = Question::all();
        $exam = Exam::whereId($request->exam_id)->first();

        foreach ($questions as $key => $question) {

            $i++;

            if ($questions->count() < $nextq) {
                return 'exam done. Your result will be published later';
            }

            if ($i === $nextq) {

                return view('admin.exam.details', compact(
                    'exam',
                    'question'
                ));
            }
        }
    }
}
