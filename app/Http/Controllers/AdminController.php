<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    /**
     * Админ панель, доступна только администраторам
     *
     * @return view 
     * @return response
     */
    public function adminPanel()
    {
        if (Auth::user()->is_admin) {
            $authors = Author::all();
            $categories = Category::all();
            return view('admin', [
                'categories' => $categories,
                'authors' => $authors
            ]);
        } else {
            response('Вы не админстратор', 432);
        }
    }

    /**
     * Добавление автора, доступно только администраторам
     *
     * @return response 
     */
    public function addAuthor(Request $request)
    {
        if (Auth::user()->is_admin) {
            $dataAuthor = $request->validate([
                'fullname' => 'required|string|max:150',
                'country' => 'required|string|max:100',
                'comment' => 'nullable|string|max:200',
            ]);
            $newBook = new Author($dataAuthor);
            $newBook->save();
        } else {
            return response('У вас нет полномочий администратора', 432);
        }
    }

    /**
     * Обновление автора, доступно только администраторам
     *
     * @return response 
     */
    public function updateAuthor(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:authors,id',
            'fullname' => 'required|string|max:150',
            'country' => 'required|string|max:100',
            'comment' => 'nullable|string|max:200',
        ]);
        $author = Author::find($request->id);
        if (Auth::user()->is_admin) {
            $editAuthor = [
                'fullname' => $request->fullname,
                'country' => $request->country,
                'comment' => $request->comment,
            ];
            $author->update($editAuthor);
        } else {
            return response('У вас нет прав администратора', 432);
        }
    }

    /**
     * Удаление автора, доступно только администраторам
     *
     * @return response 
     */
    public function deleteAuthor(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:authors,id',
        ]);
        $author = Author::find($request->id);
        if (Auth::user()->is_admin) {
            $author->delete();
        } else {
            return response('У вас нет прав администратора', 432);
        }
    }

    /**
     * Добавление категории, доступно только администраторам
     *
     * @return response 
     */
    public function addCategory(Request $request)
    {
        if (Auth::user()->is_admin) {
            $dataCategory = $request->validate([
                'title' => 'required|string|max:150',
                'description' => 'required|string|max:500',
            ]);
            $newCategory = new Category($dataCategory);
            $newCategory->save();
        } else {
            return response('У вас нет полномочий администратора', 432);
        }
    }

    /**
     * Обновление категории, доступно только администраторам
     *
     * @return response 
     */
    public function updateCategory(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:authors,id',
            'title' => 'required|string|max:150',
            'description' => 'required|string|max:500',

        ]);
        $category = Category::find($request->id);
        if (Auth::user()->is_admin) {
            $editCategory = [
                'title' => $request->title,
                'description' => $request->description,
            ];
            $category->update($editCategory);
        } else {
            return response('У вас нет прав администратора', 432);
        }
    }

    /**
     * Удаление категории, доступно только администраторам
     *
     * @return response 
     */
    public function deleteCategory(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:categories,id',
        ]);
        $category = Category::find($request->id);
        if (Auth::user()->is_admin) {
            $category->delete();
        } else {
            return response('У вас нет прав администратора', 432);
        }
    }
}
