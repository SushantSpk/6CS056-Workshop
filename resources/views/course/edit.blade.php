
<!DOCTYPE html>
<html>
<head>
    <title>Edit Course</title>
</head>
<body>

    <h1>Edit Course</h1>

    <!-- Display validation errors -->
    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <!-- Form to update an existing course -->
    <form action="/courses/{{ $course->id }}" method="POST">

        @csrf
        @method('PUT')

        <!-- Course name -->
        <label>Course Name</label>
        <input type="text" name="name"
               value="{{ old('name', $course->name) }}">

        <br><br>

        <!-- Course description -->
        <label>Description</label>
        <input type="text" name="description"
               value="{{ old('description', $course->description) }}">

        <br><br>

        <!-- Course duration -->
        <label>Duration (Weeks)</label>
        <input type="number" name="duration" min="1"
               value="{{ old('duration', $course->duration) }}">

        <br><br>

        <!-- Course fee -->
        <label>Fee</label>
        <input type="number" name="fee" min="0" step="0.01"
               value="{{ old('fee', $course->fee) }}">

        <br><br>

        <!-- Course difficulty -->
        <label>Difficulty</label>
        <select name="difficulty">

            <option value="Easy"
                @selected(old('difficulty', $course->difficulty) == 'Easy')>
                Easy
            </option>

            <option value="Medium"
                @selected(old('difficulty', $course->difficulty) == 'Medium')>
                Medium
            </option>

            <option value="Hard"
                @selected(old('difficulty', $course->difficulty) == 'Hard')>
                Hard
            </option>

        </select>

        <br><br>

        <!-- Course active status -->
        <label>Active</label>
        <input type="checkbox" name="is_active" value="1"
               @checked(old('is_active', $course->is_active))>

        <br><br>

        <!-- Save updated information -->
        <button type="submit">Update Course</button>

    </form>

    <br>

    <a href="/courses">Back to Courses</a>

</body>
</html>
