<?php

namespace App\Http\Controllers\Blog;

use App\Post;
use App\Category;
use App\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{
    public function show(Post $post)
    {
        return view('blog.show')->with('post', $post);
    }

    public function category(Category $category)
    {
        $search = request()->query('search');


        // If user is searching for a particular category, then filter by category and paginate results
        if ($search) {
            $posts = $category->posts()->where('title', 'LIKE', "%{$search}%")->simplePaginate(3);
        }

        // Otherwise simply return list of paginated categories
        $posts = $category->posts()->simplePaginate(3);


        return view('blog.category')->with([
            'category' => $category,
            'posts' => $category->posts()->simplePaginate(2),
            'categories' => Category::all(),
            'tags' => Tag::all()
        ]);
    }

    public function tag(Tag $tag)
    {
        return view('blog.tag')->with([
            'tag' => $tag,
            'posts' => $tag->posts()->simplePaginate(2),
            'categories' => Category::all(),
            'tags' => Tag::all()
        ]);
    }
}
