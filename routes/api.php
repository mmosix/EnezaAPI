<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', 'PassportController@login');
Route::post('register', 'PassportController@register');
 
Route::middleware('auth:api')->group(function () {
    Route::get('user', 'PassportController@details');
 
     Route::resource('courses', 'CourseController');
     Route::resource('subjects', 'SubjectController');
     Route::resource('tutorials', 'TutorialController');
     Route::resource('quizzes', 'QuizController');
     Route::resource('options', 'OptionController');
});
