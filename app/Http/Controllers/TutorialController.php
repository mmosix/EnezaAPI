<?php

namespace App\Http\Controllers;

use App\tutorial;
use Illuminate\Http\Request;

class TutorialController extends Controller
{
    public function index()
    {
        
        $tutorials = Tutorial::all(); 
 
        return response()->json([
            'success' => true,
            'data' => $tutorials
        ]);
    }
 
    public function show($id)
    {
        $tutorial = Tutorial::findOrFail($id);
 
        if (!$tutorial) {
            return response()->json([
                'success' => false,
                'message' => 'tutorial with id ' . $id . ' not found'
            ], 400);
        }
 
        return response()->json([
            'success' => true,
            'data' => $tutorial->toArray()
        ], 400);
    }
 
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|min:6',
            'content' => 'required',
            'course_id' => 'required|numeric'
        ]);
 
        $tutorial = new Tutorial();
        $tutorial->title = $request->title;
        $tutorial->content = $request->content;
        $tutorial->subject_id = $request->subject_id;
 
        if ($tutorial->save())
            return response()->json([
                'success' => true,
                'data' => $tutorial->toArray()
            ]);
        else
            return response()->json([
                'success' => false,
                'message' => 'tutorial could not be added'
            ], 500);
    }
 
    public function update(Request $request, $id)
    {
        $tutorial = Tutorial::findOrFail($id);
 
        if (!$tutorial) {
            return response()->json([
                'success' => false,
                'message' => 'tutorial with id ' . $id . ' not found'
            ], 400);
        }
 
        $updated = $tutorial->fill($request->all())->save();
 
        if ($updated)
            return response()->json([
                'success' => true
            ]);
        else
            return response()->json([
                'success' => false,
                'message' => 'tutorial could not be updated'
            ], 500);
    }
 
    public function destroy($id)
    {
        $tutorial = Tutorial::findOrFail($id);
 
        if (!$tutorial) {
            return response()->json([
                'success' => false,
                'message' => 'tutorial with id ' . $id . ' not found'
            ], 400);
        }
 
        if ($tutorial->delete()) {
            return response()->json([
                'success' => true
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'tutorial could not be deleted'
            ], 500);
        }
    }
}
