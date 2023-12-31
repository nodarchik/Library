<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Authors List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1>Authors List</h1>
    <a href="{{ route('authors.create') }}" class="btn btn-primary mb-3">Add New Author</a>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($authors as $author)
            <tr>
                <td>{{ $author->id }}</td>
                <td>{{ $author->email }}</td>
                <td>
                    <a href="{{ route('authors.edit', ['id' => $author->id]) }}" class="btn btn-secondary">Edit</a>
                    <form action="{{ route('authors.destroy', ['id' => $author->id]) }}" method="POST" style="display:inline;">

                    @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
