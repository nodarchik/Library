<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Services\BookService;
use App\Http\Requests\BookRequest;
use App\Services\AuthorService;

class BookController extends Controller
{
    protected BookService $bookService;
    protected AuthorService $authorService;

    public function __construct(BookService $bookService, AuthorService $authorService)
    {
        $this->bookService = $bookService;
        $this->authorService = $authorService;
    }

    /**
     * Display a listing of books.
     *
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        $title = $request->get('title');
        $author = $request->get('author');

        if ($title || $author) {
            $books = $this->bookService->searchBooks($title, $author)->paginate(10);
        } else {
            $books = $this->bookService->getAllBooksQueryBuilder()->paginate(10);
        }

        return view('books.index', compact('books'));
    }


    /**
     * Show the form for creating a new book.
     *
     * @return View
     */
    public function create(): View
    {
        $authors = $this->authorService->getAllAuthors();
        return view('books.create', compact('authors'));
    }

    /**
     * Store a newly created book.
     *
     * @param BookRequest $request
     * @return RedirectResponse
     */
    public function store(BookRequest $request): RedirectResponse
    {
        \Log::info('Validated Request Data', $request->validated());
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
        $authors = $this->authorService->getAllAuthors();
        return view('books.edit', compact('book', 'authors'));
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
