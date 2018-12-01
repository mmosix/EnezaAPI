<?php

namespace App\Http\Controllers;

use App\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index()
    {
        
        $quizzes = Quiz::all(); 
 
        return response()->json([
            'success' => true,
            'data' => $quizzes
        ]);
    }
 
    public function show($id)
    {
        $quiz = Quiz::findOrFail($id);
 
        if (!$quiz) {
            return response()->json([
                'success' => false,
                'message' => 'quiz with id ' . $id . ' not found'
            ], 400);
        }
 
        return response()->json([
            'success' => true,
            'data' => $quiz->toArray()
        ], 400);
    }
 
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|min:6',
            'subject_id' => 'required|numeric'
        ]);
 
        $quiz = new Quiz();
        $quiz->title = $request->title;
        $quiz->subject_id = $request->subject_id;
        $quiz->description = $request->description;
 
        if ($quiz->save())
            return response()->json([
                'success' => true,
                'data' => $quiz->toArray()
            ]);
        else
            return response()->json([
                'success' => false,
                'message' => 'quiz could not be added'
            ], 500);
    }
 
    public function update(Request $request, $id)
    {
        $quiz = Quiz::findOrFail($id);
 
        if (!$quiz) {
            return response()->json([
                'success' => false,
                'message' => 'quiz with id ' . $id . ' not found'
            ], 400);
        }
 
        $updated = $quiz->fill($request->all())->save();
 
        if ($updated)
            return response()->json([
                'success' => true
            ]);
        else
            return response()->json([
                'success' => false,
                'message' => 'quiz could not be updated'
            ], 500);
    }
 
    public function destroy($id)
    {
        $quiz = Quiz::findOrFail($id);
 
        if (!$quiz) {
            return response()->json([
                'success' => false,
                'message' => 'quiz with id ' . $id . ' not found'
            ], 400);
        }
 
        if ($quiz->delete()) {
            return response()->json([
                'success' => true
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'quiz could not be deleted'
            ], 500);
        }
    }
}
