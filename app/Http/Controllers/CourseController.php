<?php
 
namespace App\Http\Controllers;
 
use App\course;
use Illuminate\Http\Request;
 
class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();
 
        return response()->json([
            'success' => true,
            'data' => $courses
        ]);
    }
 
    public function show($id)
    {
        $course = Course::findOrFail($id);
 
        if (!$course) {
            return response()->json([
                'success' => false,
                'message' => 'Course with id ' . $id . ' not found'
            ], 400);
        }
 
        return response()->json([
            'success' => true,
            'data' => $course->toArray()
        ], 400);
    }
 
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|min:6'
        ]);
 
        $course = new Course();
        $course->title = $request->title;
        $course->description = $request->description;
 
        if ($course->save())
            return response()->json([
                'success' => true,
                'data' => $course->toArray()
            ]);
        else
            return response()->json([
                'success' => false,
                'message' => 'Course could not be added'
            ], 500);
    }
 
    public function update(Request $request, $id)
    {
        $course = Course::findOrFail($id);
 
        if (!$course) {
            return response()->json([
                'success' => false,
                'message' => 'Course with id ' . $id . ' not found'
            ], 400);
        }
 
        $updated = $course->fill($request->all())->save();
 
        if ($updated)
            return response()->json([
                'success' => true
            ]);
        else
            return response()->json([
                'success' => false,
                'message' => 'Course could not be updated'
            ], 500);
    }
 
    public function destroy($id)
    {
        $course = Course::findOrFail($id);
 
        if (!$course) {
            return response()->json([
                'success' => false,
                'message' => 'Course with id ' . $id . ' not found'
            ], 400);
        }
 
        if ($course->delete()) {
            return response()->json([
                'success' => true
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Course could not be deleted'
            ], 500);
        }
    }
}