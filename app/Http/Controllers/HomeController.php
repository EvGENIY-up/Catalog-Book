<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

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
}
