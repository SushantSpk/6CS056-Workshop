
<!DOCTYPE html>
<html>
<head>
    <title>Course Details</title>
</head>
<body>

    <h1>Course Details</h1>

    <!-- Display the selected course's information -->
    <p><strong>ID:</strong> {{ $course->id }}</p>

    <p><strong>Name:</strong> {{ $course->name }}</p>

    <p><strong>Description:</strong> {{ $course->description }}</p>

    <p><strong>Duration:</strong> {{ $course->duration }} weeks</p>

    <p><strong>Fee:</strong> {{ $course->fee }}</p>

    <p><strong>Difficulty:</strong> {{ $course->difficulty }}</p>

    <p><strong>Status:</strong>
        {{ $course->is_active ? 'Active' : 'Inactive' }}
    </p>

    <!-- Link to edit this course -->
    <a href="/courses/{{ $course->id }}/edit">Edit Course</a>

    <br><br>

    <!-- Return to the courses list -->
    <a href="/courses">Back to Courses</a>

</body>
</html>
