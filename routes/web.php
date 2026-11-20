
<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;

// Redirect homepage to the Student list
Route::get('/', function () {
    return redirect()->route('students.index');
});

// Register all seven Student CRUD routes
Route::resource('students', StudentController::class);

// Register all seven Course CRUD routes
Route::resource('courses', CourseController::class);
