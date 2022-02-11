<?php

namespace App\Http\Controllers;

use App\Models\Posts;

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
        return view('home')->with('posts', Posts::where('user_id', '=' , auth()->id())->orderBy('created_at','desc')->paginate(10));
    }

    public function sortDesc(){
        return view('home')->with('posts', Posts::where('user_id', '=' , auth()->id())->orderBy('created_at','desc')->paginate(10));

    }

    public function sortAsc(){

        return view('home')->with('posts', Posts::where('user_id', '=' , auth()->id())->orderBy('created_at','asc')->paginate(10));
    }
}
