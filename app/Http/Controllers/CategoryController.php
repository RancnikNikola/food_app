<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Dish;
use Illuminate\Validation\Rule;


class CategoryController extends Controller
{
    public function index()
    {
        return view('categories.index', [
            'categories' => Category::all(),
            'dishes' => Dish::all()
        ]);
    }

    public function show(Category $category)
    {
        $categories = Category::all();

        return view('categories.show', [
            'category' => $category,
            'categories' => $categories,
        ]);
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'title' => 'required',
            'slug' => ['required', Rule::unique('categories', 'slug')],
        ]);
    
        Category::create($attributes);

        return redirect('/categories');
    }
}
