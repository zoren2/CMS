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
        return view('blog.category')->with([
            'category' => $category,
            'posts' => $category->posts()->searched()->published()->simplePaginate(3),
            'categories' => Category::all(),
            'tags' => Tag::all()
        ]);
    }

    public function tag(Tag $tag)
    {
        return view('blog.tag')->with([
            'tag' => $tag,
            'posts' => $tag->posts()->searched()->published()->simplePaginate(2),
            'categories' => Category::all(),
            'tags' => Tag::all()
        ]);
    }
}
