<?php

use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\Api\StudentController;
use Illuminate\Support\Facades\Route;

// Register all five Student API routes
// (named api.students.* so they don't replace the web route names)
Route::apiResource('students', StudentController::class)->names('api.students');

// Register all five Course API routes
// (named api.courses.* so they don't replace the web route names)
Route::apiResource('courses', CourseController::class)->names('api.courses');
