<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('createpost')->with('posts', Posts::orderBy('created_at','asc')->get());

    }


    public function storePost(Request $request)
    {
       $request->validate([
           'title'=>'required',
           'description' => 'required'
       ]);

            Posts::create([
           'title' => $request->input('title'),
           'description' => $request->input('description'),
           'user_id' => auth()->user()->id,
           'imported' => false,
       ]);
       return redirect('/create/post')->with('message', 'Your post has been added!!');
    }

}
