<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Services\AuthorService;
use App\Http\Requests\AuthorRequest;

class AuthorController extends Controller
{
    protected AuthorService $authorService;

    public function __construct(AuthorService $authorService)
    {
        $this->authorService = $authorService;
    }

    /**
     * Display a listing of authors.
     *
     * @return View
     */
    public function index(): View
    {
        $authors = $this->authorService->getAllAuthors();
        return view('authors.index', compact('authors'));
    }

    /**
     * Show the form for creating a new author.
     *
     * @return View
     */
    public function create(): View
    {
        return view('authors.create');
    }

    /**
     * Store a newly created author.
     *
     * @param AuthorRequest $request
     * @return RedirectResponse
     */
    public function store(AuthorRequest $request): RedirectResponse
    {
        $this->authorService->createAuthor($request->validated());
        return redirect()->route('authors.index');
    }

    /**
     * Show the form for editing the specified author.
     *
     * @param int $id
     * @return View
     */
    public function edit(int $id): View
    {
        $author = $this->authorService->findAuthor($id);
        return view('authors.edit', compact('author'));
    }

    /**
     * Update the specified author.
     *
     * @param AuthorRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(AuthorRequest $request, int $id): RedirectResponse
    {
        $this->authorService->updateAuthor($id, $request->validated());
        return redirect()->route('authors.index');
    }

    /**
     * Remove the specified author.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        $this->authorService->deleteAuthor($id);
        return redirect()->route('authors.index');
    }
}
