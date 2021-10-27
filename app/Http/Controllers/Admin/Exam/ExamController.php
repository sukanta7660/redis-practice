<?php

namespace App\Http\Controllers\Admin\Exam;

use App\Http\Controllers\Controller;
use App\Http\Requests\ExamStoreRequest;
use App\Models\Exam;
use App\Models\Question;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exams = Exam::with([

            'questions' => function ($q) {
                $q->with('option');
            }

        ])->get();

        return view('admin.exam.index', compact('exams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.exam.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExamStoreRequest $request)
    {
        //DB::beginTransaction();
        try {
            $input_start_time = $request->start;
            $input_end_time = $request->end;
            $start = date('Y-m-d H:i:s', strtotime($input_start_time));
            $end = date('Y-m-d H:i:s', strtotime($input_end_time));

            $exam = Exam::create([
                'title' => $request->title,
                'question_length' => $request->question_length,
                'total_marks' => $request->total_marks,
                'total_time' => $request->total_time,
                'start' => $start,
                'end' => $end,
                'user_id' => auth()->user()->id
            ]);
        } catch (QueryException $e) {
            report($e);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Exam $ex
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        Session::put("nextq", 1);
        Session::put("wrongans", 0);
        Session::put("correctans", 0);


        $exam = Exam::whereId($id)->with('questions')->first();

        if (!count($exam->questions)) {
            return back();
        }

        $question = Question::where('exam_id', $id)
            ->with('option')
            ->first();

        return view('admin.exam.details', compact('exam', 'question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
