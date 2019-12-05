<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;

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
    public function index()
    {
        // $user = User::where('username', $username)->first();
        // if(isset($user))
        $posts = Post::get();
        // return $posts;
        return view('home', ['posts' => $posts]);
        // return "User not Found!";
        // return view('home');
    }
}
