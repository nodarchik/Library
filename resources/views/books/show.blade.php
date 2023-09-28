<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>წიგნის დეტალები</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1>{{ $book->name }}</h1>
    <p>ავტორები</p>
    <p>გამოშვების თარიღი: {{ $book->date_of_issue }}</p>
    <p>სტატუსი: {{ $book->status }}</p>
</div>
</body>
</html>
