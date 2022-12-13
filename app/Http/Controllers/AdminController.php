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
        $authors = Author::all();
        $categories = Category::all();
        return view('admin', [
            'categories' => $categories,
            'authors' => $authors
        ]);
    }

    /**
     * Добавление автора, доступно только администраторам
     *
     * @return response 
     */
    public function addAuthor(Request $request)
    {
        $dataAuthor = $request->validate([
            'fullname' => 'required|unique:authors|string|max:150',
            'country' => 'required|string|max:100',
            'comment' => 'nullable|string|max:200',
        ]);
        $newBook = new Author($dataAuthor);
        $newBook->save();
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
            'fullname' => 'required|unique:authors|string|max:150',
            'country' => 'required|string|max:100',
            'comment' => 'nullable|string|max:200',
        ]);
        $author = Author::find($request->id);
        $editAuthor = [
            'fullname' => $request->fullname,
            'country' => $request->country,
            'comment' => $request->comment,
        ];
        $author->update($editAuthor);
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
        $author->delete();
    }

    /**
     * Добавление категории, доступно только администраторам
     *
     * @return response 
     */
    public function addCategory(Request $request)
    {
        $dataCategory = $request->validate([
            'title' => 'required|unique:categories|string|max:150',
            'description' => 'required|string|max:500',
        ]);
        $newCategory = new Category($dataCategory);
        $newCategory->save();
    }

    /**
     * Обновление категории, доступно только администраторам
     *
     * @return response 
     */
    public function updateCategory(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:categories,id',
            'title' => 'required|unique:categories|string|max:150',
            'description' => 'required|string|max:500',

        ]);
        $category = Category::find($request->id);
        $editCategory = [
            'title' => $request->title,
            'description' => $request->description,
        ];
        $category->update($editCategory);
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
        $category->delete();
    }
}
