<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
     * @return $this
     */
    public function index()
    {

        $search = request()->query('search');


        // If searching, then filter and paginate the result
        if (request()->query('search')) {
            $posts = Post::where('title', 'LIKE', "%{$search}%")->simplePaginate(2);
        }

        // Otherwise simply return paginated posts
        else {
            $posts = Post::simplePaginate(2);
        }

        return view('welcome')->with([
            'categories' => Category::all(),
            'tags' => Tag::all(),
            'posts' => $posts
        ]);
    }
}
