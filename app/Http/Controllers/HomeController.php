<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        return view('admin.components.layout');
    }


    // public function contact()
    // {
    //    return view('admin.components.layout');
    // }


    public function posts(Request $request)
    {
        $posts = Post::get();

        return $posts;
    }
}
