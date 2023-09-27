<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Book</title>
    <link rel="stylesheet"  href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1>Edit Book</h1>
    <form action="{{ route('books.update', $book->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $book->name }}">
        </div>
        <div class="form-group">
            <label for="date_of_issue">Date of Issue</label>
            <input type="date" name="date_of_issue" id="date_of_issue" class="form-control" value="{{ $book->date_of_issue }}">
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control">
                <option value="Free" {{ $book->status === 'Free' ? 'selected' : '' }}>Free</option>
                <option value="Busy" {{ $book->status === 'Busy' ? 'selected' : '' }}>Busy</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
</body>
</html>
