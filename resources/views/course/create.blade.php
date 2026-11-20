
<!DOCTYPE html>
<html>
<head>
    <title>Create Course</title>
</head>
<body>

    <h1>Create Course</h1>

    <!-- Display validation errors -->
    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <!-- Form to create a new course -->
    <form action="/courses" method="POST">

        @csrf

        <!-- Course name -->
        <label>Course Name</label>
        <input type="text" name="name" value="{{ old('name') }}">

        <br><br>

        <!-- Course description -->
        <label>Description</label>
        <input type="text" name="description" value="{{ old('description') }}">

        <br><br>

        <!-- Course duration in weeks -->
        <label>Duration (Weeks)</label>
        <input type="number" name="duration" min="1" value="{{ old('duration') }}">

        <br><br>

        <!-- Course fee -->
        <label>Fee</label>
        <input type="number" name="fee" min="0" step="0.01" value="{{ old('fee') }}">

        <br><br>

        <!-- Course difficulty -->
        <label>Difficulty</label>
        <select name="difficulty">
            <option value="Easy" @selected(old('difficulty') == 'Easy')>Easy</option>
            <option value="Medium" @selected(old('difficulty') == 'Medium')>Medium</option>
            <option value="Hard" @selected(old('difficulty') == 'Hard')>Hard</option>
        </select>

        <br><br>

        <!-- Whether the course is active -->
        <label>Active</label>
        <input type="checkbox" name="is_active" value="1"
               @checked(old('is_active', true))>

        <br><br>

        <!-- Submit the form -->
        <button type="submit">Create Course</button>

    </form>

    <br>

    <a href="/courses">Back to Courses</a>

</body>
</html>
