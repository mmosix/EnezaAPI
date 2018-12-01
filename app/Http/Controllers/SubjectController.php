<?php

namespace App\Http\Controllers;
 
use App\subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        
        $subjects = Subject::all(); 
 
        return response()->json([
            'success' => true,
            'data' => $subjects
        ]);
    }
 
    public function show($id)
    {
        $subject = Subject::findOrFail($id);
 
        if (!$subject) {
            return response()->json([
                'success' => false,
                'message' => 'subject with id ' . $id . ' not found'
            ], 400);
        }
 
        return response()->json([
            'success' => true,
            'data' => $subject->toArray()
        ], 400);
    }
 
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|min:6',
            'course_id' => 'required|numeric'
        ]);
 
        $subject = new Subject();
        $subject->title = $request->title;
        $subject->course_id = $request->course_id;
        $subject->description = $request->description;
 
        if ($subject->save())
            return response()->json([
                'success' => true,
                'data' => $subject->toArray()
            ]);
        else
            return response()->json([
                'success' => false,
                'message' => 'subject could not be added'
            ], 500);
    }
 
    public function update(Request $request, $id)
    {
        $subject = Subject::findOrFail($id);
 
        if (!$subject) {
            return response()->json([
                'success' => false,
                'message' => 'subject with id ' . $id . ' not found'
            ], 400);
        }
 
        $updated = $subject->fill($request->all())->save();
 
        if ($updated)
            return response()->json([
                'success' => true
            ]);
        else
            return response()->json([
                'success' => false,
                'message' => 'subject could not be updated'
            ], 500);
    }
 
    public function destroy($id)
    {
        $subject = Subject::findOrFail($id);
 
        if (!$subject) {
            return response()->json([
                'success' => false,
                'message' => 'subject with id ' . $id . ' not found'
            ], 400);
        }
 
        if ($subject->delete()) {
            return response()->json([
                'success' => true
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'subject could not be deleted'
            ], 500);
        }
    }
}
