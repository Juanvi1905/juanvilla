<!DOCTYPE html>
<html>
<head>
    <title>Create Task</title>
</head>
<body>
    <h1>Create Task</h1>
    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required>
        <label for="description">Description:</label>
        <textarea id="description" name="description" required></textarea>
        <button type="submit">Create</button>
    </form>
</body>
</html>
