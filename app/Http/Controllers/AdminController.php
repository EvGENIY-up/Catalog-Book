<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
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
}
