<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\User;
use GuzzleHttp\Psr7\Response;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    /**
     * Приватный метод класса HomeController
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
    /**
     * Получаем страницу книги по id
     *
     * @param integer $id
     * @return book
     */
    public function getBook($id)
    {
        $book = Book::with('author')->with('category')
            ->with('user')->find($id);
        $authors = $this->getAuthorsAndCategories()['authors'];
        $categories = $this->getAuthorsAndCategories()['categories'];
        return view('book', [
            'book' => $book,
            'categories' => $categories,
            'authors' => $authors
        ]);
    }

    /**
     * Добавление книги, доступно только авторизвованым пользователям
     *
     * @param Request $request
     * @return response с резьлутатом выполнения
     */
    public function addBook(Request $request)
    {
        if (Auth::check()) {
            $request->validate([
                'title' => 'required|string|max:150',
                'year' => 'required|integer|max_digits:4',
                'description' => 'required|string|max:2000',
                'author_id' => 'required|integer|exists:authors,id',
                'category_id' => 'required|integer|exists:categories,id',
            ]);

            $data = [
                'title' => $request->title,
                'year' => $request->year,
                'description' => $request->description,
                'author_id' => $request->author_id,
                'category_id' => $request->category_id,
                'user_id' => Auth::user()->id,
            ];
            $newBook = new Book($data);
            $newBook->save();
        } else {
            return response('Вы не авторизованы', 432);
        }
    }
    /**
     * Обновление книги, достпуно только добавившим её пользователем
     * и администратором
     *
     * @param Request $request
     * @return response с резьлутатом выполнения
     */
    public function updateBook(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:books,id',
            'title' => 'required|string|max:150',
            'year' => 'required|integer|max_digits:2022',
            'description' => 'required|string|max:2000',
            'author_id' => 'required|integer|exists:authors,id',
            'category_id' => 'required|integer|exists:categories,id',
        ]);
        $book = Book::find($request->id);
        if (Auth::user()->id === $book->user_id || Auth::user()->is_admin) {
            $editBook = [
                'title' => $request->title,
                'year' => $request->year,
                'description' => $request->description,
                'author_id' => $request->author_id,
                'category_id' => $request->category_id,
            ];
            $book->update($editBook);
        } else {
            return response('У вас нет прав администратора', 432);
        }
    }

    /**
     * Удаление книги, достпуно только добавившим её пользователем
     * и администратором
     *
     * @param Request $request
     * @return response с резьлутатом выполнения
     */
    public function deleteBook(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:books,id',
        ]);
        $book = Book::find($request->id);
        if (Auth::user()->id === $book->user_id || Auth::user()->is_admin) {
            $book->delete();
        } else {
            return response('У вас нет прав администратора', 432);
        }
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

        $filteredBooks = $filteredBooks->paginate(6);

        return $filteredBooks;
    }
}
