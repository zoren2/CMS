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
        return view('welcome')->with([
            'categories' => Category::all(),
            'tags' => Tag::all(),
            'posts' => Post::searched()->published()->simplePaginate(2)
        ]);
    }
}
