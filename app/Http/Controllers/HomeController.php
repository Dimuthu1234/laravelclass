<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Blog;
use App\BlogCategory;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function welcome() {
        $blogz = Blog::orderBy('id', 'DESC')->paginate(4);
        $blogCategory = BlogCategory::orderBy('id', 'DESC')->paginate(4);
        return view('welcome')
            ->with('blogz', $blogz)
            ->with('blogCategories', $blogCategory);
    }
}
