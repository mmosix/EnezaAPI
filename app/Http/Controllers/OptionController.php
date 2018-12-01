<?php

namespace App\Http\Controllers;

use App\option;
use Illuminate\Http\Request;

class OptionController extends Controller
{
    public function index()
    {
        
        $options = Option::all(); 
 
        return response()->json([
            'success' => true,
            'data' => $options
        ]);
    }
 
    public function show($id)
    {
        $option = Option::findOrFail($id);
 
        if (!$option) {
            return response()->json([
                'success' => false,
                'message' => 'option with id ' . $id . ' not found'
            ], 400);
        }
 
        return response()->json([
            'success' => true,
            'data' => $option->toArray()
        ], 400);
    }
 
    public function store(Request $request)
    {
        $this->validate($request, [
            'choice' => 'required|string',
            'question_id' => 'required|numeric'
        ]);
 
        $option = new Option();
        $option->choice = $request->choice;
        $option->question_id = $request->question_id;
 
        if ($option->save())
            return response()->json([
                'success' => true,
                'data' => $option->toArray()
            ]);
        else
            return response()->json([
                'success' => false,
                'message' => 'option could not be added'
            ], 500);
    }
 
    public function update(Request $request, $id)
    {
        $option = Option::findOrFail($id);
 
        if (!$option) {
            return response()->json([
                'success' => false,
                'message' => 'option with id ' . $id . ' not found'
            ], 400);
        }
 
        $updated = $option->fill($request->all())->save();
 
        if ($updated)
            return response()->json([
                'success' => true
            ]);
        else
            return response()->json([
                'success' => false,
                'message' => 'option could not be updated'
            ], 500);
    }
 
    public function destroy($id)
    {
        $option = Option::findOrFail($id);
 
        if (!$option) {
            return response()->json([
                'success' => false,
                'message' => 'option with id ' . $id . ' not found'
            ], 400);
        }
 
        if ($option->delete()) {
            return response()->json([
                'success' => true
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'option could not be deleted'
            ], 500);
        }
    }
}
