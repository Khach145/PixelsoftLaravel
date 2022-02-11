<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PostsFromApi extends Controller
{
    public function index()
    {
        return view('createpost');
    }

    public function list()
    {

        $data = Http::get('https://sq1-api-test.herokuapp.com/posts')->json();

        Posts::create([
            'title' => $data['data'][0]['title'],
            'description' => $data['data'][0]['description'],
            'user_id' => auth()->user()->id,
            'imported' => true,
        ]);

        return redirect('/create/post')->with('message', 'Your post has been added!!');
    }

}
