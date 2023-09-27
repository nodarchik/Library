<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Services\BookService;
use App\Http\Requests\BookRequest;

class BookController extends Controller
{
    protected BookService $bookService;

    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }

    /**
     * Display a listing of books.
     *
     * @return View
     */
    public function index(): View
    {
        $books = $this->bookService->getAllBooks();
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new book.
     *
     * @return View
     */
    public function create(): View
    {
        return view('books.create');
    }

    /**
     * Store a newly created book.
     *
     * @param BookRequest $request
     * @return RedirectResponse
     */
    public function store(BookRequest $request): RedirectResponse
    {
        $this->bookService->createBook($request->validated());
        return redirect()->route('books.index');
    }

    /**
     * Display the specified book.
     *
     * @param int $id
     * @return View
     */
    public function show(int $id): View
    {
        $book = $this->bookService->findBook($id);
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified book.
     *
     * @param int $id
     * @return View
     */
    public function edit(int $id): View
    {
        $book = $this->bookService->findBook($id);
        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified book.
     *
     * @param BookRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(BookRequest $request, int $id): RedirectResponse
    {
        $this->bookService->updateBook($id, $request->validated());
        return redirect()->route('books.index');
    }

    /**
     * Remove the specified book.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        $this->bookService->deleteBook($id);
        return redirect()->route('books.index');
    }
}
