
<!DOCTYPE html>
<html>
<head>
    <title>Students List</title>
</head>
<body>

    <h1>Students List</h1>

    <!-- Display success message after creating, editing or deleting -->
    @if(session('success'))
        <p style="color: green;">
            {{ session('success') }}
        </p>
    @endif

    <!-- Link to create a new student -->
    <a href="/students/create">Create Student</a>

    <br><br>

    <!-- Display all students in a table -->
    <table border="1" cellpadding="10">

        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>

            <!-- Loop through all students -->
            @forelse($students as $student)

                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->phone }}</td>

                    <td>

                        <!-- View student details -->
                        <a href="/students/{{ $student->id }}">
                            View
                        </a>

                        <!-- Edit student information -->
                        <a href="/students/{{ $student->id }}/edit">
                            Edit
                        </a>

                        <!-- Delete student -->
                        <form action="/students/{{ $student->id }}"
                              method="POST"
                              style="display:inline;">

                            @csrf
                            @method('DELETE')

                            <button type="submit">Delete</button>

                        </form>

                    </td>
                </tr>

            <!-- Display message if no students exist -->
            @empty
                <tr>
                    <td colspan="5">No students found.</td>
                </tr>
            @endforelse

        </tbody>
    </table>

</body>
</html>
