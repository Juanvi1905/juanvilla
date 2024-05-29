<!DOCTYPE html>
<html>
<head>
    <title>Task List</title>
</head>
<body>
    <h1>Task List</h1>
    <a href="{{ route('tasks.create') }}">Create Task</a>
    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif
    <ul>
        @foreach ($tasks as $task)
            <li>{{ $task->title }} - {{ $task->description }}
                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>
