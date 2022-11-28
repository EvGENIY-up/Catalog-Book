<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*   public function __construct()
    { 
        $this->middleware('auth');
    }*/


    /**
     * Приватная метод класса HomeController
     * для получения всех авторов или категорий
     *
     * @return void
     */
    private function getAuthorsAndCategories()
    {
        $authors = Author::all();
        $categories = Category::all();

        return [
            'categories' => $categories,
            'authors' => $authors
        ];
    }

    /**
     * Основная страница каталога книг
     *
     * @return Renderable
     */
    public function index()
    {
        $props = Book::with('author')->with('category')
            ->with('user')->paginate(6);
        $authors = $this->getAuthorsAndCategories()['authors'];
        $categories = $this->getAuthorsAndCategories()['categories'];
        return view('home', [
            'props' => $props,
            'categories' => $categories,
            'authors' => $authors
        ]);
    }

    public function getBook($id)
    {
        $book = Book::with('author')->with('category')
            ->with('user')->find($id);
        return view('book', [
            'book' => $book
        ]);
    }

    /**
     * Поиск по автору/названию книги
     *
     * @param Request $request
     * @return Collection $books Книги, отфильтрованные поиском
     */
    public function search(Request $request)
    {
        $filteredBooks = Book::with('author')->with('category')
            ->with('user');

        if ($request->type == 2) {
            $author = $request->value;
            $filteredBooks = $filteredBooks->whereHas('author', function (Builder $query) use ($author) {
                $query->where('fullname', 'LIKE', "%$author%");
            });
        } else {
            $filteredBooks = $filteredBooks->where('title', 'LIKE', "%$request->value%");
        }

        $filteredBooks = $filteredBooks->paginate(2);

        return $filteredBooks;
    }
}
