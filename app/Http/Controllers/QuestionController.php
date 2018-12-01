<?php

namespace App\Http\Controllers;

use App\question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {
        
        $questions = Question::all(); 
 
        return response()->json([
            'success' => true,
            'data' => $questions
        ]);
    }
 
    public function show($id)
    {
        $question = Question::findOrFail($id);
 
        if (!$question) {
            return response()->json([
                'success' => false,
                'message' => 'question with id ' . $id . ' not found'
            ], 400);
        }
 
        return response()->json([
            'success' => true,
            'data' => $question->toArray()
        ], 400);
    }
 
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|min:6',
            'answer' => 'required|string'
        ]);
 
        $question = new Question();
        $question->title = $request->title;
        $question->answer = $request->answer;
 
        if ($question->save())
            return response()->json([
                'success' => true,
                'data' => $question->toArray()
            ]);
        else
            return response()->json([
                'success' => false,
                'message' => 'question could not be added'
            ], 500);
    }
 
    public function update(Request $request, $id)
    {
        $question = Question::findOrFail($id);
 
        if (!$question) {
            return response()->json([
                'success' => false,
                'message' => 'question with id ' . $id . ' not found'
            ], 400);
        }
 
        $updated = $question->fill($request->all())->save();
 
        if ($updated)
            return response()->json([
                'success' => true
            ]);
        else
            return response()->json([
                'success' => false,
                'message' => 'question could not be updated'
            ], 500);
    }
 
    public function destroy($id)
    {
        $question = Question::findOrFail($id);
 
        if (!$question) {
            return response()->json([
                'success' => false,
                'message' => 'question with id ' . $id . ' not found'
            ], 400);
        }
 
        if ($question->delete()) {
            return response()->json([
                'success' => true
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'question could not be deleted'
            ], 500);
        }
    }
}
