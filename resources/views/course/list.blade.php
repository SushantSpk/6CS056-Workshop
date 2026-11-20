
<!DOCTYPE html>
<html>
<head>
    <title>Courses List</title>
</head>
<body>

    <h1>Courses List</h1>

    <!-- Display success message -->
    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <!-- Link to create a course -->
    <a href="/courses/create">Create Course</a>

    <br><br>

    <!-- Display all courses -->
    <table border="1" cellpadding="10">

        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Duration</th>
            <th>Fee</th>
            <th>Difficulty</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>

        <!-- Loop through courses -->
        @forelse($courses as $course)

            <tr>
                <td>{{ $course->id }}</td>
                <td>{{ $course->name }}</td>
                <td>{{ $course->duration }} weeks</td>
                <td>{{ $course->fee }}</td>
                <td>{{ $course->difficulty }}</td>
                <td>{{ $course->is_active ? 'Active' : 'Inactive' }}</td>

                <td>
                    <!-- View course -->
                    <a href="/courses/{{ $course->id }}">View</a>

                    <!-- Edit course -->
                    <a href="/courses/{{ $course->id }}/edit">Edit</a>

                    <!-- Delete course -->
                    <form action="/courses/{{ $course->id }}"
                          method="POST" style="display:inline;">

                        @csrf
                        @method('DELETE')

                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>

        @empty

            <tr>
                <td colspan="7">No courses found.</td>
            </tr>

        @endforelse

    </table>

</body>
</html>
