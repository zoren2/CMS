<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

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
        return view('home');
    }

    /*
     * Shows a list of categories
     */
    public function listindex()
    {
        $categories = Category::all();
        return view('categorieslist')->with('categories', $categories);
    }

    /*
     * Shows page in order to add new content.
     */
    public function categories()
    {
        return view('categories');
    }

    public function store()
    {
        $this->validate(request(), [
            'name' => 'requred|min:2|max:24'
        ]);

        $data = request()->all();

        $category = new Category();
        $category->category = $data['category'];
        $category->save();
        session()->flash('success', 'Category successfully added.');
        return redirect('/categories');

    }


}
