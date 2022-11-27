<?php

namespace App\Http\Controllers;

use App\Models\Book;
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
   /* }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    /*public function index($count) //link?page=2
    {
        $users =  User::where('id', 'LIKE', 2)->paginate($count);
        foreach ($users as $book) {
            $book->canUpdate = Auth::user()->can('update', $book);
        }
        return $users;
        //  return view('home');
    }*/
    /**
     * Основная страница каталога книг
     *
     * @return Renderable
     */
    public function index()
    {
        $props = Book::with('author')->with('category')
            ->with('user')->paginate(6);
        return view('home', [
            'props' => $props
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
