<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $Questions=Question::paginate();
        return view('Dashboard.questions.index',compact('Questions'))->with('i',($request->input('page',1)-1)*15);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Dashboard.questions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         //question , answer
        $data= $request->validate([
             "question"=>"required|string",
             "answer"=>"required|string"
         ]);
        Question::create($data);
        return redirect()->route('questions.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Question $question)
    {
        return view('Dashboard.questions.edit',compact('question'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Question $question)
    {
        $data= $request->validate([
            "question"=>"required|string",
            "answer"=>"required|string"
        ]);
        $question->update($data);
       return redirect()->route('questions.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {
        $question->delete();
        return back();
    }
}
