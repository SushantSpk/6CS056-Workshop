
<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Student;
use App\Models\Course;

/* Redirect the homepage to the student list */
Route::get('/', function () {

    // Send the user to the students page
    return redirect()->route('students.index');

});

/* Display the form to create a student */
Route::get('/students/create', function () {
    return view('student.create');
});


/* Display the list of all students */
Route::get('/students', function () {

    // Retrieve all students from the database
    $students = Student::all();

    // Pass the students to the Blade view
    return view('student.list', [
        'students' => $students
    ]);

})->name('students.index');


/* Handle the submitted student form */
Route::post('/students', function (Request $request) {

    // Validate the submitted form data
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:students,email',
        'phone' => 'required|string|max:20',
        'address' => 'nullable|string|max:500',
        'date_of_birth' => 'nullable|date',
    ]);

    // Save the validated information to MySQL
    $student = Student::create($validated);

    // Redirect to the student list with a success message
    return redirect()->route('students.index')
        ->with('success', "Student {$student->name} created successfully!");

});


/* Display the details of a single student */
Route::get('/students/{id}', function ($id) {

    // Find the student using their ID
    $student = Student::findOrFail($id);

    // Pass the student information to the detail page
    return view('student.detail', [
        'student' => $student
    ]);

})->name('students.show');


/* Display the form to edit a student */
Route::get('/students/{id}/edit', function ($id) {

    // Find the student we want to edit
    $student = Student::findOrFail($id);

    // Pass the student information to the edit form
    return view('student.edit', [
        'student' => $student
    ]);

})->name('students.edit');


/* Handle the submitted student edit form */
Route::put('/students/{id}', function (Request $request, $id) {

    // Find the existing student using their ID
    $student = Student::findOrFail($id);

    // Validate the updated student information
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => [
            'required',
            'email',
            'max:255',
            Rule::unique('students', 'email')->ignore($student->id),
        ],
        'phone' => 'required|string|max:20',
        'address' => 'nullable|string|max:500',
        'date_of_birth' => 'nullable|date',
    ]);

    // Update the student information in MySQL
    $student->update($validated);

    // Redirect to the student list with a success message
    return redirect()->route('students.index')
        ->with('success', 'Student updated successfully!');

})->name('students.update');


/* Delete a student from the database */
Route::delete('/students/{id}', function ($id) {

    // Find the student we want to delete
    $student = Student::findOrFail($id);

    // Delete the student from MySQL
    $student->delete();

    // Redirect to the student list with a success message
    return redirect()->route('students.index')
        ->with('success', 'Student deleted successfully!');

})->name('students.destroy');


/* Display the form to create a course */
Route::get('/courses/create', function () {
    return view('course.create');
});


/* Display the list of all courses */
Route::get('/courses', function () {

    // Retrieve all courses from the database
    $courses = Course::all();

    // Pass the courses to the Blade view
    return view('course.list', [
        'courses' => $courses
    ]);

})->name('courses.index');


/* Handle the submitted course form */
Route::post('/courses', function (Request $request) {

    // Validate the submitted form data
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string|max:255',
        'duration' => 'required|integer|min:1',
        'fee' => 'required|numeric|min:0',
        'difficulty' => 'required|in:Easy,Medium,Hard',
    ]);

    // Check if the course is active
    $validated['is_active'] = $request->boolean('is_active');

    // Save the validated information to MySQL
    $course = Course::create($validated);

    // Redirect to the course list
    return redirect()->route('courses.index')
        ->with('success', "Course {$course->name} created successfully!");

});


/* Display the details of a single course */
Route::get('/courses/{id}', function ($id) {

    // Find the course using its ID
    $course = Course::findOrFail($id);

    // Pass the course information to the detail page
    return view('course.detail', [
        'course' => $course
    ]);

})->name('courses.show');


/* Display the form to edit a course */
Route::get('/courses/{id}/edit', function ($id) {

    // Find the course we want to edit
    $course = Course::findOrFail($id);

    // Pass the course information to the edit form
    return view('course.edit', [
        'course' => $course
    ]);

})->name('courses.edit');


/* Handle the submitted course edit form */
Route::put('/courses/{id}', function (Request $request, $id) {

    // Find the existing course
    $course = Course::findOrFail($id);

    // Validate the updated course information
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string|max:255',
        'duration' => 'required|integer|min:1',
        'fee' => 'required|numeric|min:0',
        'difficulty' => 'required|in:Easy,Medium,Hard',
    ]);

    // Check whether the course is active
    $validated['is_active'] = $request->boolean('is_active');

    // Update the course information in MySQL
    $course->update($validated);

    // Redirect to the course list
    return redirect()->route('courses.index')
        ->with('success', 'Course updated successfully!');

})->name('courses.update');


/* Delete a course from the database */
Route::delete('/courses/{id}', function ($id) {

    // Find the course we want to delete
    $course = Course::findOrFail($id);

    // Delete the course from MySQL
    $course->delete();

    // Redirect to the course list
    return redirect()->route('courses.index')
        ->with('success', 'Course deleted successfully!');

})->name('courses.destroy');
