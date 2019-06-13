<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\Categories\UpdateCategoriesRequest;
use App\Http\Requests\Posts\CreatePostsRequest;
use App\Http\Requests\Posts\UpdatePostRequest;
use App\Post;


class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('verifyCategoriesCount')->only(['create', 'store']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('posts.index')->with('posts', Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create')->with('categories', Category::all());
    }

    /**
     * @param CreatePostsRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(CreatePostsRequest $request)
    {
        // upload the image to the storage
        $image = $request->image->store('posts', 'public');

        // create the post
        Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'content' => $request->content,
            'image' => $image,
            'published_at' => $request->published_at,
            'category_id' => $request->category
        ]);

        // flash message
        session()->flash('success', 'Post created successfully.');

        // redirect user
        return redirect(route('posts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * @param Post $post
     * @return $this
     */
    public function edit(Post $post)
    {
        // Multiple Variables passed to posts.create by passing array instead of chaining withs
        return view('posts.create')->with([
            'post' => $post,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCategoriesRequest $request
     * @param Post $Post
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        // Pull only title, desc, published at, and content fields
        $data = $request->only(['title', 'description', 'published_at', 'content']);

        // check if new image was selected
        if ($request->hasFile('image')) {
            // upload the new image
            $image = $request->image->store('posts', 'public');
            // delete old image
            $post->deleteImage();

            $data['image'] = $image;
        }
        // update attributes
        $post->update($data);

        // store mesage
        session()->flash('success', 'Post updated successfully');
        // redirect user
        return redirect(route('posts . index'));
    }

    /**
     * Removes a post from the database. Soft deleting does not work with route
     * model binding.
     *
     * @param $id
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $post = Post::withTrashed()->where('id', $id)->firstOrFail();
        // If the post is only trashed then delete permanently from database.
        if ($post->trashed()) {
            $post->deleteImage();
            $post->forceDelete();
            session()->flash('success', 'Post deleted successfully . ');
            return redirect(route('trashed-posts.index'));
        } // If the post hasn't been trashed yet, then soft delete .
        else {
            $post->delete();
            session()->flash('success', 'Post trashed successfully.');
            return redirect(route('posts.index'));
        }

    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function trashed()
    {
        $trashed = Post::onlyTrashed()->get();
        return view('posts.index')->withPosts($trashed);
    }

    /*
     *
     */
    public function restore($id)
    {
        $post = Post::withTrashed()->where('id', $id)->firstOrFail();
        $post->restore();
        session()->flash('success', 'Post restored successfully');
        return view('posts.index')->withPosts(Post::onlyTrashed()->get()); // Returns view with trashed items
    }
}
