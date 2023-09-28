<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Books List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        .page-item.active .page-link {
            background-color: #007bff;
            border-color: #007bff;
        }
        .page-link {
            color: #007bff;
        }
        .page-link:hover {
            background-color: #f8f9fa;
            color: #007bff;
        }
        .pagination {
            justify-content: center;
        }
        .pagination li {
            margin: 0 5px;
        }
    </style>

</head>
<body>
<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-0">წიგნების სია</h1>
        <a href="{{ route('books.create') }}" class="btn btn-primary">წიგნის დამატება</a>
    </div>

    <!-- Search Bar -->
    <div class="mb-4">
        <form action="{{ route('books.index') }}" method="GET" class="d-flex">
            <input class="form-control me-2" type="search" placeholder="დასახელებით ძიება" aria-label="Search by title" name="title">
            <input class="form-control me-2" type="search" placeholder="ავტორით ძიება" aria-label="Search by author" name="author">
            <button class="btn btn-outline-success" type="submit">ძებნა</button>
        </form>
    </div>

    <table class="table table-striped">
        <thead>
        <tr>
            <th class="px-2">აიდი</th>
            <th class="px-2">დასახელება</th>
            <th class="px-2">ავტორი</th>
            <th class="px-2">გამოშვების თარიღი</th>
            <th class="px-2">სტატუსი</th>
            <th class="px-2">მოქმედება</th>
        </tr>
        </thead>
        <tbody>
        @foreach($books as $book)
            <tr>
                <td class="px-2">{{ $book->id }}</td>
                <td class="px-2">{{ $book->name }}</td>
                <td class="px-2">
                    {{ $book->authors->pluck('name')->join(', ') }}
                </td>
                <td class="px-2">{{ $book->date_of_issue }}</td>
                <td class="px-2">{{ $book->status }}</td>
                <td class="px-2">
                    <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning me-1">შეცვლა</a>
                    <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">წაშლა</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {{ $books->links('vendor.pagination.bootstrap-5') }}
    </div>

</div>
</body>
</html>
