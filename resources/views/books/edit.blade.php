<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Book</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h1 class="mb-4">წიგნის შეცლა</h1>
            <form action="{{ route('books.update', $book->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group mb-3">
                    <label for="name" class="form-label">დასახელება</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $book->name }}">
                </div>
                <div class="form-group mb-3">
                    <label for="date_of_issue" class="form-label">გამოშვების თარიღი</label>
                    <input type="date" name="date_of_issue" id="date_of_issue" class="form-control" value="{{ $book->date_of_issue }}">
                </div>
                <div class="form-group mb-4">
                    <label for="status" class="form-label">სტატუსი</label>
                    <select name="status" id="status" class="form-control">
                        <option value="თავისუფალია" {{ $book->status === 'თავისუფალია' ? 'selected' : '' }}>თავისუფალია</option>
                        <option value="დაკავებულია" {{ $book->status === 'დაკავებულია' ? 'selected' : '' }}>დაკავებულია</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">განახლება</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
